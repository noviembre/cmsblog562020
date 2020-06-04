<?php
    /**
     * User: Invidato
     * Date: 6/4/2020
     * Time: 10:38 AM
     */

    namespace App\Http\Requests;

    use Illuminate\Auth\Access\AuthorizationException;
    use Illuminate\Foundation\Http\FormRequest;


    class UserDestroyRequest extends FormRequest
    {

        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            #--- if user is NOT the default user or if the user is NOT the current user
            #--- return the below function forbiddenResponse()
            #--- this message only will show up if the current user delete button is not blocked
            return !($this->route('users') == config('cms.protected_user_id') ||
                $this->route('users') == auth()->user()->id);
        }

        // no pusimos la función forbiddenResponse() q debería estar aqui
        // por qué funciona sin ella además dicha función ya no existe a partir de laravel 5.3
        // pero funciona perfectamente
        // muestra una notificacion





        public function rules()
        {
            return [
                //
            ];

        }

    }