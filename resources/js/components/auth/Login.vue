<template>
    <div class="pt-10">
        <div class="container pt-5">
            <!-- <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
        
                        <div class="card-body">
                            <form method="POST" action="/login">
                                
                                
                                <input type="hidden" name="_token" :value="csrf">
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">Correo</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
        
                                      
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">
        
                                      
                                    </div>
                                </div>
        
                               
        
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Iniciar sesión
                                        </button>
        
                                      
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <section class="gradient-form" style="background-color: #f8fafc;" >
                <div class="container py-5" >
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                      <div class="card rounded-3 text-black">
                        <div class="row g-0">
                          <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
              
                              <div class="text-center">
                                <img src="https://demodaoutlet.com/wp-content/uploads/2019/05/lili-pink.jpg"
                                  style="width: 185px;" alt="logo">
                      
                              </div>
                              <form method="POST" action="/login">
                              <!-- <form method="POST" action="{{ route('login') }}"> -->
                                <input type="hidden" name="_token" :value="csrf">
                                <p>Por favor ingresa con tus credenciales</p>
              
                                <div class="form-outline mb-4">
                                  <input type="email" id="form2Example11"  class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus />
                                    
                                  <label class="form-label" for="form2Example11">Usuario</label>
                                </div>
              
                                <div class="form-outline mb-4">
                                  <input id="form2Example22" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                    
                                  <label class="form-label" for="form2Example22">Contraseña</label>
                                </div>
              
                                <div class="text-center pt-1 mb-5 pb-1" >
                                  <button class="btn btn-primary col-12 gradient-custom-2 mb-3" type="submit">Iniciar sesión</button>
                                 
                                </div>
              
                              
                              </form>
              
                            </div>
                          </div>
                          <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                              <h4 class="mb-4">Trabajamos con el corazón todos los días</h4>
                              <p class="mb-0">Nos comprometemos con la FELICIDAD de las 
                                mujeres que piensan en comodidad y que les gusta estar en 
                                tendencia, creando y comercializando productos a precios
                                 asequibles para demostrar que no es necesario invertir 
                                 tanto para tener lo mejor de la moda en tus manos.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
        </div>
     
        
    </div>
</template>

<script>
    export default {
        props:['token'],
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          }),

    }
</script>

<style lang="scss" scoped>
    .pt-10{
        
    }
    .btn{
        width: 50%;
    }
    .gradient-custom-2{
        background: rgb(232,81,153);
        background: linear-gradient(90deg, rgba(232,81,153,1) 0%, rgba(3,168,162,1) 100%);
      }
</style>