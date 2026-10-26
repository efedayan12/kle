<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    private function createProduct(): Product
    {
        return Product::create([
            'name' => 'Kalem',
            'price' => 149.90,
            'description' => 'Mavi tükenmez kalem',
        ]);
    }

    public function test_product_list_is_displayed(): void
    {
        $this->createProduct();

        $response = $this->actingAs(User::factory()->create())->get(route('products.index'));

        $response->assertOk();
        $response->assertSee('Kalem');
        $response->assertSee('149,90 TL');
    }

    public function test_product_pages_are_displayed(): void
    {
        $product = $this->createProduct();
        $user = User::factory()->create();

        $this->actingAs($user)->get(route('products.create'))->assertOk();
        $this->actingAs($user)->get(route('products.show', $product))->assertOk()->assertSee('Mavi tükenmez kalem');
        $this->actingAs($user)->get(route('products.edit', $product))->assertOk();
    }

    public function test_user_can_create_product(): void
    {
        $response = $this->actingAs(User::factory()->create())->post(route('products.store'), [
            'name' => 'Defter',
            'price' => '89.50',
            'description' => 'Kareli defter',
        ]);

        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('success', 'Ürün eklendi.');
        $this->assertDatabaseHas('products', ['name' => 'Defter', 'description' => 'Kareli defter']);
    }

    public function test_user_can_update_product(): void
    {
        $product = $this->createProduct();

        $response = $this->actingAs(User::factory()->create())->put(route('products.update', $product), [
            'name' => 'Kurşun Kalem',
            'price' => '25',
            'description' => 'HB kurşun kalem',
        ]);

        $response->assertRedirect(route('products.show', $product));
        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Kurşun Kalem']);
    }

    public function test_user_can_delete_product(): void
    {
        $product = $this->createProduct();

        $response = $this->actingAs(User::factory()->create())->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));
        $this->assertModelMissing($product);
    }

    public function test_guest_cannot_create_product(): void
    {
        $response = $this->post(route('products.store'), [
            'name' => 'Defter',
            'price' => '89.50',
            'description' => 'Kareli defter',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount('products', 0);
    }

    public static function invalidProducts(): array
    {
        return [
            'boş ad' => [['name' => '', 'price' => '10', 'description' => 'Açıklama'], 'name'],
            'çok uzun ad' => [['name' => str_repeat('a', 256), 'price' => '10', 'description' => 'Açıklama'], 'name'],
            'sayı olmayan fiyat' => [['name' => 'Kalem', 'price' => 'on lira', 'description' => 'Açıklama'], 'price'],
            'negatif fiyat' => [['name' => 'Kalem', 'price' => '-5', 'description' => 'Açıklama'], 'price'],
            'üç ondalık basamak' => [['name' => 'Kalem', 'price' => '12.345', 'description' => 'Açıklama'], 'price'],
            'kolona sığmayan fiyat' => [['name' => 'Kalem', 'price' => '100000000', 'description' => 'Açıklama'], 'price'],
            'boş açıklama' => [['name' => 'Kalem', 'price' => '10', 'description' => ''], 'description'],
        ];
    }

    #[DataProvider('invalidProducts')]
    public function test_invalid_product_data_is_rejected(array $data, string $field): void
    {
        $response = $this->actingAs(User::factory()->create())->post(route('products.store'), $data);

        $response->assertSessionHasErrors($field);
        $this->assertDatabaseCount('products', 0);
    }
}
