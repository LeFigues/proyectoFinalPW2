<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
<form class="form-inline" method="POST" action="{{ route('logout') }}">

      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li>
      <a href="/" class="nav-link text-white">
        <strong>DEPROAL</strong>
      </a>
    </li>
        <li class="nav-item">
      
      <a href="/dashboard" class="nav-link text-white" aria-current="page">
      <strong>{{ Auth::user()->name }}</strong>
      @csrf
       
      </a>
    
    </li>
  <hr>
    <li>
      <a href="/ventas" class="nav-link text-white">
        Ventas
      </a>
    </li>
    <li>
      <a href="/pedidos" class="nav-link text-white">
        Pedidos
      </a>
    </li>
    <li>
      <a href="/einvoicelist" class="nav-link text-white">
        Historial
      </a>
    </li>
    <hr>
    <li>
      <a href="/ajaxcustomerlist" class="nav-link text-white">
        Clientes
      </a>
    </li>
  <hr>
    <li>
      <a href="/ajaxproductlist" class="nav-link text-white">
        Productos
      </a>
    </li>
    <li>
      <a href="/productalmacen" class="nav-link text-white">
        Almacen
      </a>
    </li>
    <li>
      <a href="/materiallist" class="nav-link text-white">
        Materiales
      </a>
    </li>
  <hr>
    <li>
      <a href="/ajaxemployeelist" class="nav-link text-white">
        Empleados
      </a>
    </li>
    <hr>
    <li>
      <a href="/webinfo/{0}" class="nav-link text-white">
        Detalles
      </a>
    </li>
    <li>
      <a href="/salepointlist" class="nav-link text-white">
        Puntos de Venta
      </a>
    </li>
    <hr>
    <li>
      <div class="d-grid gap-2">
        <x-responsive-nav-link class="btn btn-warning" :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
            Cerrar Sesion
        </x-responsive-nav-link>
      </div>
      
    </li>
        </ul>

      </div>
    </nav>



