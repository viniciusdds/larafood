@include('admin.includes.alerts')

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $tenant->name ?? old('name')}}">
</div>
<div class="form-group">
    <label>Logo:</label>
    <input type="file" name="logo" class="form-control" placeholder="Logo" value="{{ $tenant->logo ?? old('logo')}}">
</div>
<div class="form-group">
    <label>E-mail:</label>
    <input type="email" name="email" class="form-control" placeholder="E-mail" value="{{ $tenant->email ?? old('email')}}">
</div>
<div class="form-group">
    <label>CNPJ:</label>
    <input type="number" name="cnpj" class="form-control" placeholder="CNPJ" value="{{ $tenant->cnpj ?? old('cnpj')}}">
</div>
<div class="form-grpup">
    <label>* Ativo?</label>
    <select name="active" class="form-control">
        <option value="Y" @if(isset($tenant) && $tenant->active == 'Y') selected @endif >SIM</option>
        <option value="N" @if(isset($tenant) && $tenant->active == 'N') selected @endif >NÃO</option>
    </select>
</div>
<hr>
<h3>Assinatura</h3>
<div class="form-group">
    <label>Data Assinatura (início):</label>
    <input type="date" name="subscription" class="form-control" placeholder="Data Assinatura (início)" value="{{ $tenant->subscription ?? old('subscription') }}">
</div>
<div class="form-group">
    <label>* Assinatura Ativa?</label>
    <select name="subscription_active" class="form-control">
        <option value="1" @if(isset($tenant) && $tenant->subscription_active) selected @endif >SIM</option>
        <option value="0" @if(isset($tenant) && !$tenant->subscription_active) selected @endif>NÃO</option>
    </select>
</div>
<div class="form-group">
    <label>* Assinatura Cancelada?</label>
    <select name="subscription_suspended" class="form-control">
        <option value="1" @if(isset($tenant) && $tenant->subscription_suspended) selected @endif >SIM</option>
        <option value="0" @if(isset($tenant) && !$tenant->subscription_suspended) selected @endif>NÃO</option>
    </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>