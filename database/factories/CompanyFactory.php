<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $companyName = $this->faker->company;

        // Generate a domain name based on the company name
        $domainExtensions = ['com', 'co.uk', 'net', 'org']; // Possible variations
        $domainExtension = $this->faker->randomElement($domainExtensions);
        $domain = strtolower(str_replace(' ', '', $companyName)) . '.' . $domainExtension;

        // Generate an email based on the domain
        $emailPrefixes = ['info', 'contact', 'support'];
        $emailPrefix = $this->faker->randomElement($emailPrefixes);
        $email = $emailPrefix . '@' . $domain;

        $logos = File::files(public_path('storage/logos/'));
        $randomLogo = $logos ? 'logos/' . $logos[array_rand($logos)]->getFilename() : null;

        return [
            'name' => $companyName,
            'email' => $email,
            'logo' => $randomLogo,
            'website' => 'https://' . $domain,
        ];
    }
}
