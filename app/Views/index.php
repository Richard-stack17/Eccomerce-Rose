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
      <header class="fixed top-0 left-0 z-50 w-full">
        <div class="navbar relative z-20 border-b bg-white">
          <div class="px-6 md:px-12 lg:container lg:mx-auto lg:px-6 lg:py-4">
            <div class="flex items-center justify-between">
              <div class="relative z-20">
                <a href="#">
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
                          href="#novedades"
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
                          href="#footer"
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
                        <i class="fa-solid fa-cart-shopping" style="color: #fafafa;"></i>
                      </a>
                    </div>
                    <div
                      class="border-t py-8 px-6 md:px-12 md:py-16 lg:border-t-0 lg:py-0 lg:pr-0 lg:pl-6"
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
    <section
      class="w-full relative bg-[url('../src/img/main.avif')] bg-cover bg-center min-[500px]:bg-top h-[650px] mt-[100px]"
      style="
        background-image: linear-gradient(
            rgba(24, 24, 24, 0),
            rgba(203, 203, 203, 0.068)
          ),
          url('../src/img/main.avif');
      "
    >
      <div
        class="relative text-center pt-[20%]"
        style="text-shadow: 2px 2px 2px black"
      >
        <p class="text-[3rem] text-white font-semibold drop-shadow-md">
          Mira lo nuevo que tenemos para esta temporada
        </p>
        <h1 class="text-[2rem] text-white font-semibold">
          Colección Fashion 23
        </h1>
        <button
          class="text-[1.5rem] text-black my-5 font-semibold bg-[#85A5CD] px-3"
          
        >
          <a href="#blog">
          Mira lo que tenemos
          </a>
        </button>
      </div>
    </section>

    <!-- component -->
    <!-- This is an example component -->
    <div class="w-full flex flex-wrap md:grid md:grid-cols-2 border-slate-800 border-b-[2px] shadow-sm shadow-black">
      <div class="basis-[50%]">
        <img src="../src/img/addSpring.webp" class="w-full h-full object-cover"/>
      </div>
      <div class="basis-[50%] flex flex-col items-center justify-center p-10 bg-rose-50 w-full gap-5 shadow-md ">
        <h2 class="text-[2.5rem] text-center">Spring ultimate</h2>
        <p class="text-lg text-justify">"Prepárate para recibir la temporada más colorida y fresca del año con nuestra nueva colección de ropa primaveral Spring, llena de diseños únicos y contemporáneos que te harán sentir renovada y lista para disfrutar la naturaleza en todo su esplendor."</p>
        <a href="<?=base_url('/ropas')?>" class="text-lg block my-5 text-white bg-black p-3">Vamos</a>
      </div>
    </div>

    <div class="md:grid  md:grid-cols-2 items-baseline relative" id="novedades">
      <div class="mx-auto my-0 md:hidden ">
        <img src="../src/img/add2.avif" class="object-fill w-full"/>
      </div>
      <div
        id="indicators-carousel"
        class="hidden md:grid w-full bg-red-100 h-full py-10"
        data-carousel="slide"
      >
        <!-- Carousel wrapper -->
        <div class="relative h-full overflow-hidden rounded-lg">
          <!-- Item 1 -->
          <div
            class="absolute hidden duration-700 ease-in-out"
            data-carousel-item="active"
          >
            <img
              src="../src/img/abrigoA.webp"
              class="absolute block h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover rounded-2xl"
              alt="..."
            />
          </div>
          <!-- Item 2 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="../src/img/abrigoB.webp"
              class="absolute block h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover rounded-2xl"
              alt="..."
            />
          </div>
          <!-- Item 3 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="../src/img/abrigoC.webp"
              class="absolute block h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover rounded-2xl"
              alt="..."
            />
          </div>
          <!-- Item 4 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="../src/img/abrigoD.webp"
              class="absolute block h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover rounded-2xl"
              alt="..."
            />
          </div>
          <!-- Item 5 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img
              src="../src/img/abrigoE.webp"
              class="absolute block h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover rounded-2xl"
              alt="..."
            />
          </div>
        </div>
        <!-- Slider indicators -->
        
        <!-- Slider controls -->
        
        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
      </div>
      <div class="mx-auto my-0">
        <img src="../src/img/add3.avif" class="object-fill w-full"/>
      </div>
    </div>
    <!--BLOG-->
    <section class="pb-20 bg-rose-50 pt-5" id="blog">
      <h2 class="text-center text-2xl font-semibold">BLOG</h2>
      <div class="flex flex-wrap gap-4 items-baseline justify-center mt-4">
        <div class="border-red-200 border-[5px] w-[400px]">
          <img
            src="../src/img/abrigo1.png"
            class="max-h-[300px] w-full object-cover"
          />
          <div class="p-5 text-justify">
            <p>
              Cómo usar pantalones jogger: guía completa para un look cómodo y
              chic
            </p>
            <p class="font-bold my-3">23 de junio del 2023</p>
          </div>
        </div>
        <div class="border-red-200 border-[5px] w-[400px]">
          <img
            src="../src/img/abrigo2.png"
            class="max-h-[300px] w-full object-cover"
          />
          <div class="p-5 text-justify">
            <p>Las tendencias de moda que no puedes perderte en 2023</p>
            <p class="font-bold my-3">23 de junio del 2023</p>
          </div>
        </div>
        <div class="border-red-200 border-[5px] w-[400px]">
          <img
            src="../src/img/abrigo3.png"
            class="max-h-[300px] w-full object-cover"
          />
          <div class="p-5 text-justify">
            <p>
              Más allá de la apariencia física: la importancia de la salud
              mental en la moda femenina
            </p>
            <p class="font-bold my-3">23 de junio del 2023</p>
          </div>
        </div>
      </div>
    </section>
    <footer
      class="bg-black text-white text-justify p-5 grid gap-5 min-[800px]:grid-cols-2 min-[800px]:grid-rows-2 min-[1100px]:grid-cols-4 min-[1100px]:grid-rows-1" id="footer"
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
    <p class="text-center bg-slate-950 text-white">
      ©2023 Hecho por Richard Ailton Alfaro Manzano
    </p>
    <script>
      window.addEventListener("scroll", function () {
        var navbar = document.querySelector(".navbar");
        var scrollPosition = window.scrollY;
        if (window.innerWidth >= 1024) {
          if (scrollPosition > 0) {
            navbar.classList.add("opacity-80");
          } else {
            navbar.classList.remove("opacity-80");
          }
        }
      });
    </script>
  </body>
</html>
