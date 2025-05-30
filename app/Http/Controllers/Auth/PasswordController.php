<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
   public function update(Request $request): RedirectResponse
   {
      $validated = $request->validateWithBag('updatePassword', [
         'current_password' => ['required', function ($attribute, $value, $fail) {
            if (!Hash::check($value, Auth::user()->password)) {
               session()->flash('error', 'La contraseña actual no es correcta.');
               return $fail('La contraseña actual no es correcta.');
            }
         }],
         'password' => ['required', 'string', 'confirmed', function ($attribute, $value, $fail) use ($request) {
            if ($value !== $request->input('password_confirmation')) {
               session()->flash('error', 'Las contraseñas nuevas no coinciden.');
               return $fail('Las contraseñas nuevas no coinciden.');
            }
         }],
      ]);

      if (session()->has('error')) {
         return redirect()->route('perfil')->with('error', session('error'));
      }

      $request->user()->update([
         'password' => Hash::make($validated['password']),
      ]);

      Auth::logout();

      session()->flash('success', '¡Tu contraseña ha sido actualizada correctamente!');

      return redirect()->route('login');
   }
}
