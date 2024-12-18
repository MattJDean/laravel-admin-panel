<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generate first and last names
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;

        // Assign a random company
        $company = Company::inRandomOrder()->first();

        // Generate an email based on the employee's name and company's domain
        $email = strtolower($firstName . '.' . $lastName . '@' . parse_url($company->website, PHP_URL_HOST));

        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'company_id' => $company->id,
            'email' => $email,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
