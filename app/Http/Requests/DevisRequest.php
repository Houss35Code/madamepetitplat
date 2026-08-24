<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevisRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'prenom'          => ['required', 'string', 'max:100'],
            'nom'             => ['required', 'string', 'max:100'],
            'email'           => ['required', 'email', 'max:255'],
            'telephone'       => ['nullable', 'string', 'max:20'],
            'type_evenement'  => ['required', 'string', 'in:anniversaire,mariage,cocktail,baby_shower,evenement_pro,autre'],
            'nb_convives'     => ['required', 'integer', 'min:1'],
            'date_evenement'  => ['nullable', 'date', 'after:today'],
            'message'         => ['nullable', 'string', 'max:2000'],
            // Honeypot — doit être vide
            'website'         => ['sometimes', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'prenom.required'         => 'Le prénom est obligatoire.',
            'nom.required'            => 'Le nom est obligatoire.',
            'email.required'          => 'L\'email est obligatoire.',
            'email.email'             => 'L\'email n\'est pas valide.',
            'type_evenement.required' => 'Le type d\'événement est obligatoire.',
            'type_evenement.in'       => 'Le type d\'événement sélectionné n\'est pas valide.',
            'nb_convives.required'    => 'Le nombre de convives est obligatoire.',
            'nb_convives.min'         => 'Le nombre de convives doit être au moins 1.',
            'date_evenement.after'    => 'La date de l\'événement doit être dans le futur.',
            'website.max'             => 'Formulaire invalide.',
        ];
    }
}