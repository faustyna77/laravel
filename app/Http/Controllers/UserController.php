<?
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Pobranie listy użytkowników
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        // Pobranie danych użytkownika do edycji
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Walidacja danych formularza
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            
        ]);

        // Aktualizacja danych użytkownika
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'Dane użytkownika zostały zaktualizowane.');
    }
}
