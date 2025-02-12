<form action="">
    @csrf
    <h2>Login</h2>
    <label for="email"></label>
    <input type="email" name="email" id="email" required value="{{ old('email') }}">
    <label for="password"></label>
    <input type="password" name="password" id="password" required>
    <button type="submit"></button>
</form>