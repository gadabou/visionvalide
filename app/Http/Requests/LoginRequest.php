<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required',],
            'password' => ['required',],
        ];
    }

    public function getCredentials()
    {
        $username = $this->get('username');
        if ($this->isMail($username)) {
            return [
                'email' => $username,
                'password' => $this->get('password'),
            ];
        }
        return $this->only('username', 'password');
    }

    private function isMail($param){
        $factory = $this->container->make(ValidationFactory::class);
        return ! $factory->make(
            ['username' => $param],
            ['username' => 'email']
        )->fails();
    }

}