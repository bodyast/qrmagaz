<template>
    <header>
        <section class="content">
            <div class="row header_rows">
                <div class="col-md-2">
                    <div class="logo">
                        <img class="logo_img" src="/images/img.png">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="menu_header">
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Scan&Order</a></li>
                            <li><a href="#">Integration</a></li>
                            <li><a href="#">Plans</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="my_accaunt">
                        My account
                        <div class="accaunt_login hidden">
                            @if(Auth::user())
                            <div class="user_auth">
<!--                                <p>{{ Auth::user()->name }}</p>-->
                                <a href="/dashboard/{{ Auth::user()->id }}">Dashboard</a>
<!--                                <a class="dropdown-item" href="{{ route('logout') }}"-->
<!--                                   onclick="event.preventDefault();-->
<!--                                                     document.getElementById('logout-form').submit();">-->
<!--                                    {{ __('Logout') }}-->
<!--                                </a>-->
<!--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">-->
<!--                                    @csrf-->
<!--                                </form>-->
<!--                            </div>-->
<!--                            @else-->
<!--                            <p id="login">Log in</p>-->
<!--                            <a href="/registration" id="registration">Registration</a>-->
<!--                            @endif-->
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </header>
    <div id="logins"></div>

</template>

<script>
export default {
    name: "header-v"
}
</script>

<style scoped>

</style>
