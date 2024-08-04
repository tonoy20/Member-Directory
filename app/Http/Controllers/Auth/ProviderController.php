<?php
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request, $provider)
    {
        try {
            $socialiteUser = Socialite::driver($provider)->stateless()->user();

            // Check if the email already exists
            if (User::where('email', $socialiteUser->getEmail())->exists()) {
                return redirect('/login')->withErrors(['email' => 'This email is already in use!']);
            }

            // Find or create the user
            $user = User::firstOrCreate(
                ['google_id' => $socialiteUser->getId()],
                [
                    'name' => $socialiteUser->getName(),
                    'email' => $socialiteUser->getEmail(),
                    'google_token' => $socialiteUser->token,
                    'email_verified_at' => null,
                    'role_id' => 3,
                    'remember_token' => null
                ]
            );

            // Log in the user
            Auth::login($user);

            return redirect('/');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['login' => 'Unable to login, please try again.']);
        }
    }
}
