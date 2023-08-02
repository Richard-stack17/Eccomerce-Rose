<!DOCTYPE html>
<html class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../dist/output.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/a152c0e72a.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body style="font-family: 'Barlow', sans-serif">
    <nav>
      <header class="sticky top-0 left-0 z-50 w-full">
        <div class="navbar relative z-20 border-b bg-white">
          <div class="px-6 md:px-12 lg:container lg:mx-auto lg:px-6 lg:py-4">
            <div class="flex items-center justify-between">
              <div class="relative z-20">
                <a href="<?=base_url('/')?>">
                  <img
                    src="../src/img/logo.png"
                    alt="logo-rose"
                    class="w-[10rem] py-3 min-[700px]:pt-2"
                  />
                </a>
              </div>

              <div class="flex items-center justify-end border-l lg:border-l-0">
                <input
                  type="checkbox"
                  name="hamburger"
                  id="hamburger"
                  class="peer"
                  hidden
                />
                <label
                  for="hamburger"
                  class="peer-checked:hamburger block relative z-20 p-6 -mr-6 cursor-pointer lg:hidden"
                >
                  <div
                    aria-hidden="true"
                    class="m-auto h-0.5 w-6 rounded bg-sky-900 transition duration-300"
                  ></div>
                  <div
                    aria-hidden="true"
                    class="m-auto mt-2 h-0.5 w-6 rounded bg-sky-900 transition duration-300"
                  ></div>
                </label>

                <div
                  class="peer-checked:translate-x-0 fixed inset-0 w-[calc(100%-4.5rem)] translate-x-[-100%] bg-white border-r shadow-xl transition duration-300 lg:border-r-0 lg:w-auto lg:static lg:shadow-none lg:translate-x-0"
                >
                  <div
                    class="flex flex-col h-full justify-between lg:items-center lg:flex-row"
                  >
                    <ul
                      class="px-6 pt-32 text-gray-700 space-y-8 md:px-12 lg:space-y-0 lg:flex lg:space-x-12 lg:pt-0 text-lg font-semibold"
                    >
                      <li>
                        <a
                          href="<?=base_url('/')?>"
                          class="group relative before:absolute before:inset-x-0 before:bottom-[-5px] before:h-1 before:bg-rose-100"
                        >
                          <i class="fa-solid fa-house-user"></i
                          ><span class="relative text-rose-800 ml-2"
                            >INICIO</span
                          >
                        </a>
                      </li>
                      <li>
                        <a
                          href="<?=base_url('/')?>"
                          class="group relative before:absolute before:inset-x-0 before:bottom-[-5px] before:h-1 before:origin-right before:scale-x-0 before:bg-rose-100 before:transition before:duration-200 hover:before:origin-left hover:before:scale-x-100"
                        >
                          <i class="fa-solid fa-bullhorn"></i
                          ><span class="relative group-hover:text-rose-800 ml-2"
                            >NOVEDADES</span
                          >
                        </a>
                      </li>
                      <li>
                        <a
                          href="<?=base_url('/ropas')?>"
                          class="group relative before:absolute before:inset-x-0 before:bottom-[-5px] before:h-1 before:origin-right before:scale-x-0 before:bg-rose-100 before:transition before:duration-200 hover:before:origin-left hover:before:scale-x-100"
                        >
                          <i class="fa-solid fa-shirt"></i
                          ><span class="relative group-hover:text-rose-800 ml-2"
                            >ROPAS</span
                          >
                        </a>
                      </li>
                      <li>
                        <a
                          href="<?=base_url('/')?>"
                          class="group relative before:absolute before:inset-x-0 before:bottom-[-5px] before:h-1 before:origin-right before:scale-x-0 before:bg-rose-100 before:transition before:duration-200 hover:before:origin-left hover:before:scale-x-100"
                        >
                          <i class="fa-solid fa-people-group"></i
                          ><span class="relative group-hover:text-rose-800 ml-2"
                            >ACERCA DE</span
                          >
                        </a>
                      </li>
                    </ul>

                    <div
                      class="border-t py-8 px-6 md:px-12 md:py-16 lg:border-t-0 lg:border-l lg:py-0 lg:pr-0 lg:pl-6"
                    >
                      <a
                        href="<?=base_url('/login')?>"
                        class="block px-6 py-3 rounded-full bg-gradient-to-r from-rose-400 to-red-400 text-center text-white"
                      >
                        ADMIN
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    </nav>
    <form class="text-black p-10 flex flex-col gap-7  bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-white via-white to-rose-100">
      <h1 class="text-center text-[3rem] text-red-600 font-bold mb-4">¿Qué estás buscando?</h1>
      <div class="flex flex-wrap justify-center items-center gap-5">
        
            <a class="bg-white border-[5px] border-rose-500 max-w-[300px] rounded-2xl cursor-pointer" href="<?=base_url('/go_producto')?>">
                <div class="text-center bg-rose-100 text-[1.5rem] font-black rounded-t-2xl border-rose-500 border-b-[4px] text-red-700 tracking-widest styleShadow"><h2>Producto</h2></div>
                <div class="p-5"><img src="../src/img/product.png"/></div>
            </a>
            <a class="bg-red-50 border-[5px] border-rose-500 max-w-[300px] rounded-2xl cursor-pointer" href="<?=base_url('/proveedor')?>">
                <div class="text-center bg-rose-100 text-[1.5rem] font-black rounded-t-2xl border-rose-500 border-b-[4px] text-red-700 tracking-widest styleShadow">Proveedor</div>
                <div class="p-5"><img src="../src/img/supplier.png" class="w-full object-cover"/></div>
            </a>
        
            <a class="bg-white border-[5px] border-rose-500 max-w-[300px] rounded-2xl cursor-pointer" href="<?=base_url('/expedidor')?>">
                <div class="text-center bg-rose-100 text-[1.5rem] font-black rounded-t-2xl border-rose-500 border-b-[4px] text-red-700 tracking-widest styleShadow">Expedidor</div>
                <div class="p-5"><img src="../src/img/shipper.png" class="w-full object-cover"/></div>
            </a>
            <a class="bg-red-50 border-[5px] border-rose-500 max-w-[300px] rounded-2xl cursor-pointer" href="<?=base_url('/go_categorias')?>">
                <div class="text-center bg-rose-100 text-[1.5rem] font-black rounded-t-2xl border-rose-500 border-b-[4px] text-red-700 tracking-widest styleShadow">Categoria</div>
                <div class="p-5"><img src="../src/img/category.png" class="w-full object-cover"/></div>
            </a>
            <a class="bg-white border-[5px] border-rose-500 max-w-[300px] rounded-2xl cursor-pointer" href="<?=base_url('/go_empleado')?>">
                <div class="text-center bg-rose-100 text-[1.5rem] font-black rounded-t-2xl border-rose-500 border-b-[4px] text-red-700 tracking-widest styleShadow">Empleado</div>
                <div class="p-5"><img src="../src/img/employee.png" class="w-full object-cover"/></div>
            </a>
            <a class="bg-red-50 border-[5px] border-rose-500 max-w-[300px] rounded-2xl cursor-pointer" href="<?=base_url('/verOrdenes')?>">
                <div class="text-center bg-rose-100 text-[1.5rem] font-black rounded-t-2xl border-rose-500 border-b-[4px] text-red-700 tracking-widest styleShadow">Ver Ordenes</div>
                <div class="p-5"><img src="../src/img/order.png" class="w-full object-cover"/></div>
            </a>
      </div>
    </form>
    </div>

    <footer
      class="bg-black text-white text-justify p-5 grid gap-5 min-[800px]:grid-cols-2 min-[800px]:grid-rows-2 min-[1100px]:grid-cols-4 min-[1100px]:grid-rows-1"
    >
      <div class="leading-8 min-[800px]:pr-6">
        <h3 class="uppercase font-extrabold text-[1.2rem]">
          Acerca de nosotros
        </h3>
        <p>
          Somos una empresa de venta de ropa con más de 6 años de experiencia,
          lideres en prendas de calidad
        </p>
      </div>
      <div class="leading-8">
        <h3 class="uppercase font-extrabold text-[1.2rem]">
          Enlaces de interés
        </h3>
        <p>Blog</p>
        <p>Contactanos</p>
        <p>Tiendas</p>
        <p>Términos del servicio</p>
        <p>Libro de reclamaciones</p>
      </div>
      <div class="leading-8">
        <h3 class="uppercase font-extrabold text-[1.2rem]">Contacto</h3>
        <p>Whatsapp: +51999999</p>
        <p>Email: carmenconfecciones@gmail.com</p>
        <p>Facebook: CarmenConfecciones</p>
        <p class="flex gap-2 flex-wrap">
          <span><i class="fa-brands fa-facebook"></i></span
          ><span><i class="fa-brands fa-instagram"></i></span
          ><span><i class="fa-brands fa-whatsapp"></i></span
          ><span><i class="fa-brands fa-tiktok"></i></span>
        </p>
      </div>
      <form class="leading-8">
        <h3 class="uppercase font-extrabold text-[1.2rem]">Socios</h3>
        <p>
          ¡Recibe 10% en tu primera compra, entérate antes que nadie de nuestras
          novedades y ten acceso a descuentos exclusivos!
        </p>
        <input
          class="my-5 pl-[15px] text-black"
          type="email"
          placeholder="Correo electrónico"
        />
        <button class="block my-5 text-black bg-white px-4">Enviar</button>
      </form>
    </footer>
  </body>
</html>
