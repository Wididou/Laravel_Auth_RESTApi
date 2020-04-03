 @extends('layouts.app')
 @section('content')
 
<div class="container">

 @if($errors->any())
 @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
      {{ $error }}
    </div>
 @endforeach
 @endif

<!-- 

-->
  <!--  <p class="h4 mb-4">Add User </p>

    <div class="form-row mb-4">
        <div class="col">
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" name="nom" placeholder="Nom">
        </div>
        <div class="col">
            <input type="text" id="defaultRegisterFormLastName" class="form-control" name="prenom" placeholder="Prenom">
        </div>
    </div>

    <input type="service" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">
    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">

  
    <input type="text" id="defaultRegisterPhonePassword" class="form-control" name="numero_tel" placeholder="Télephone" aria-describedby="defaultRegisterFormPhoneHelpBlock">
 

    <button class="btn btn-info my-4 btn-block" type="submit"></button> -->

      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Ajouter User') }}</div>
  
                  <div class="card-body">
                      <form method="POST" action="{{ route('user.store') }}">
                          @csrf
  
                          <div class="form-group row">
                              <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
  
                              <div class="col-md-6">
                                  <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
  
                                  @error('nom')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>
  
                              <div class="col-md-6">
                                  <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror"  name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
  
                                  @error('prenom')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Addresse E-Mail') }}</label>
  
                              <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
  
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="numero_tel" class="col-md-4 col-form-label text-md-right">{{ __('Télephone') }}</label>
  
                              <div class="col-md-6">
                                  <input id="numero_tel" type="text" class="form-control @error('numero_tel') is-invalid @enderror" name="numero_tel" value="{{ old('numero_tel') }}" required autocomplete="numero_tel">
  
                                  @error('numero_tel')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="service" class="col-md-4 col-form-label text-md-right mdb-main-label">{{ __('Service') }}</label>
  
                              <div class="col-md-6">
                                  <select id="service" class="browser-default custom-select @error('service') is-invalid @enderror" name="service" value="{{ old('service') }}" required autocomplete="service">
                                      <option value="" disabled selected>Selectionnez le service</option>
                                      <option value="SI">SI</option>
                                      <option value="Production">Production</option>
                                      <option value="Achat & Stock">Achat & Stock</option>
                                      <option value="Commerciale">Commerciale</option>
                                      <option value="QHSE">QHSE</option>
                                      <option value="Autre">Autre</option>
                                  </select>
                                  @error('service')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right mdb-main-label">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select id="role_id" class="browser-default custom-select @error('role_id') is-invalid @enderror" name="role_id" value="{{ old('role_id') }}" required autocomplete="role_id">
                                    <option value="" disabled selected>Selectionnez le role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->nom }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
  
                              <div class="col-md-6">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
  
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>  
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Ajouter') }}
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>

    
      <!-- </form> -->

 </div>
 @endsection
