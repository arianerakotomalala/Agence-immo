@extends('client.base')
<div class="container  mt-5">
    <div class="row justify-content-center ">
        <div class="col-md-7">
            <div class="card ">
                <div class="card-header">
                    <h4 class="mb-0">S'inscrire</h4>
                        </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group mt-3">
                                        @if (@session('success'))
                                            {{session('success')}}   
                                        @endif

                                        <label for="numero">Nom</label>
                                            @error('name')
                                                {{$message}}
                                            @enderror
                                            <input type="numero" class="form-control" id="email" name="name" placeholder="votre nom" required>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="password">Mot de passe</label>
                                        @error('password')
                                            {{$message}}
                                        @enderror
                                        <input type="password" class="form-control" id="password" name="password" placeholder="votre mot de passe" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 p-2 ">S'incrire</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>