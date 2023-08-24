<!DOCTYPE html>
<html>
<head>
@include('includes.header')



@include('includes.homeentete')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h5></h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a>@yield('titre_page')</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>@yield('position')</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
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
