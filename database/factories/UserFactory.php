<?php




namespace Database\Factories;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Gerios',
            'email' => 'geriossarkis3@gmail.com',
            'roles_id' => Roles::factory()->create()->id,  // Retrieve the ID of the created role
            'email_verified_at' => now(),
            'password' => Hash::make('Thenewhello1200'),
            'remember_token' => Str::random(10),
        ];
    }
}
?>