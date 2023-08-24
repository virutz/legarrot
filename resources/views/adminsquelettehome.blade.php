<!DOCTYPE html>
<html>
<head>
@include('includes.header')

@include('includes.adminmenu')

@include('includes.adminentete')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12" align="center">
        <h2>@yield('titre_page')</h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-content">

            @yield('contenu')

            </div>
        </div>
    </div>
</div>

@include('includes.footer')

</body>

</html>
