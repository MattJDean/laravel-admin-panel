<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generate a company name without forcing "Ltd." every time
        $companyName = $this->faker->company;

        // Generate a domain name based on the company name
        $domainExtensions = ['com', 'co.uk', 'net', 'org']; // Possible variations
        $domainExtension = $this->faker->randomElement($domainExtensions);
        $domain = strtolower(str_replace(' ', '', $companyName)) . '.' . $domainExtension;

        // Generate an email based on the domain
        $emailPrefixes = ['info', 'contact', 'support'];
        $emailPrefix = $this->faker->randomElement($emailPrefixes);
        $email = $emailPrefix . '@' . $domain;

        return [
            'name' => $companyName,
            'email' => $email,
            'logo' => null, // Optional: Add logic to generate or point to placeholder logos
            'website' => 'https://' . $domain,
        ];
    }
}
