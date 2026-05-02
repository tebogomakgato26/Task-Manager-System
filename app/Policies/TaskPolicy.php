<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Any logged-in user can view tasks
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * User can view task if they own it or are admin
     */
    public function view(User $user, Task $task): bool
    {
        return $user->id === $task->user_id || $user->role === 'admin';
    }

    /**
     * Any logged-in user can create tasks
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * User can update their own task or admin can update any
     */
    public function update(User $user, Task $task): bool
    {
        return $user->id === $task->user_id || $user->role === 'admin';
    }

    /**
     * User can delete their own task or admin can delete any
     */
    public function delete(User $user, Task $task): bool
    {
        return $user->id === $task->user_id || $user->role === 'admin';
    }

    /**
     * Restore (not used yet)
     */
    public function restore(User $user, Task $task): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Force delete (only admin)
     */
    public function forceDelete(User $user, Task $task): bool
    {
        return $user->role === 'admin';
    }
}
