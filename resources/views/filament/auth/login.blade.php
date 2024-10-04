<form method="POST" action="{{ route('filament.auth.login') }}">
    @csrf

    <div class="mb-4">
        <label for="email">Email address</label>
        <input type="email" name="email" id="email" class="form-control" required autofocus>
    </div>

    <div class="mb-4">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <!-- New user type dropdown -->
    <div class="mb-4">
        <label for="user_type">Login as</label>
        <select name="user_type" id="user_type" class="form-control" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>

    <div class="mb-4">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
</form>
