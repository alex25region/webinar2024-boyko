<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\User\SaveUserRequest;
use App\Models\User;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class UserController extends Controller
{

    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }

    public function index(): View
    {
        return view('users.index', [
            'users' => $this->userRepository->list(),
        ]);
    }

    public function create(): View
    {
        $user = new User();
        return view('users.create', compact('user'));
    }

    public function store(SaveUserRequest $request): RedirectResponse
    {
        if ($this->userRepository->create($request->validated())) {
            session()->put('success', 'Пользователь успешно создан!');
        } else {
            session()->put('error', 'Ошибка! Не удалось создать пользователя.');
        }
        return to_route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveUserRequest $request, User $user)
    {
        if ($this->userRepository->update($user, $request->validated())) {
            session()->put('success', 'Пользователь успешно отредактирован!');
        } else {
            session()->put('error', 'Ошибка! Не удалось отредактировать пользователя.');
        }
        return to_route('users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($this->userRepository->delete($user)) {
            session()->put('success', 'Пользователь успешно удален!');
        } else {
            session()->put('error', 'Ошибка! Не удалось удалить пользователя.');
        }
        return back();
    }
}
