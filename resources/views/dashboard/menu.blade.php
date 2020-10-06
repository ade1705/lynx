<div class="list-group bg-transparent sidebar">
    <a href="/dashboard" class="h3 list-group-item list-group-item-action border-0 @if(\Request::route()->getName() === 'dashboard') active @endif">
       <span class="border-bottom border-danger"> <i data-feather="box"></i></span>
        Dashboard
    </a>
    <a class="list-group-item list-group-item-action border-0 small">MANAGE</a>
    <a href="/dashboard/messages"
       class="list-group-item list-group-item-action border-0 @if(\Request::route()->getName() === 'dashboard-messages') active @endif">
        <i data-feather="mail"></i>
        Messages
    </a>
    <a href="/dashboard/orders"
       class="list-group-item list-group-item-action border-0 @if(\Request::route()->getName() === 'dashboard-orders') active @endif">
        <i data-feather="shopping-bag"></i>
        Orders
    </a>
    <a class="list-group-item list-group-item-action border-0 @if(\Request::route()->getName() === 'dashboard-services') active @endif"
        href="/dashboard/services">
        <i data-feather="layout"></i> Services
    </a>
    <a class="list-group-item list-group-item-action border-0 @if(\Request::route()->getName() === 'dashboard-profile') active @endif"
        href="/dashboard/profile">
        <i data-feather="sliders"></i> Settings
    </a>
</div>
