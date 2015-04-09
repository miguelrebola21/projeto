@extends ('app')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Insira aqui os seus dados para passar a ter acesso online à sua conta!</div>
        <div class="panel-body">
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="name" value="name">
            <div class="form-group">
              <label class="col-md-4 control-label">Número de Cliente :</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="id_cliente" value="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">E-mail que consta na sua Ficha de Cliente:</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Password:</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Confirmar Password:</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Enviar Aplicação!
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>