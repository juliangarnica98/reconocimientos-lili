<template>
    <div>
        <nav
            class="navbar navbar-dark navbar-expand-lg  box fixed-top bg-black"
           
        >
            <a class="nav-link text-dark w-25 mx-auto text-center"   href="/">
                <img class="img-fluid" :src="logo"  style="max-width: 50%;"/>
            </a>
            <button
                class="navbar-toggler "
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse"
                aria-expanded="false"
                aria-label="Toggle navigation"
               
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav  ml-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link text-dark" href="/reconocimientos">
                            <img class="" :src="logo" width="10%" />
                        </a>
                    </li> -->
                    <li class="nav-item">
                        
                        <a class="nav-link text-light" href="/login"
                            ><strong>INICIAR SESIÓN</strong></a
                        >
                    </li>                  
                </ul>
            </div>
        </nav>

    </div>
</template>

<script>
export default {
    data() {
        return {
            logo: "./images/logo.png",
        };
    },
};
</script>

<style lang="scss" scoped>
.box {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
.bg-black{
    background-color: #000000;
  }

</style>
