# Proyecto final - BooksTo

BooksTo es una tienda en línea enfocada en la venta de libros y a continuación explicaré sus funcionalidades:

**Funcionalidades**

- BooksTo cuenta con dos tipos de roles:

  - Cliente → El usuario de tipo cliente puede realizar diferentes tareas:

    - Agregar libros a su carrito.
    - Realizar una orden.
    - Pagar la orden utilizando el sistema de pago PayPal.
    - Imprimir su recibo con los  datos de su orden, siempre y cuando su orden no esté en estado "pendiente de pago" ni "anulada".
    - Realizar el seguimiento de  sus órdenes.

  - Administrador → El usuario tipo administrador puede realizar diferentes tareas:

    - CRUD autores, podrá eliminar  los autores siempre y cuando no estén relacionados con algún libro.
         - Dentro de la edición de un autor, el administrador puede hacer lo siguiente:
            - Podrá ver, agregar y eliminar las imágenes que tenga almacenadas el autor.
            - Podrá cambiar la información básica del autor.
    - CRUD editoriales, podrá eliminar las editoriales siempre y cuando no estén relacionadas con algún libro.
    - CRUD categorías, podrá eliminar las categorías siempre y cuando no estén relacionadas con algún libro.
    - CRUD libros.
        - Dentro de la edición de un libro, el administrador puede hacer lo siguiente:
            - Podrá cambiar la información del libro.
            - Podrá ver, agregar y eliminar las imágenes que tenga almacenadas el libro,
            - Podrá agregar uno, muchos o ningún autor al libro dependiendo de la situación.
            - Podrá cambiar el status del libro de "publicado" a "no publicado" o viceversa.

    - Cambiar los roles de los usuarios registrados, siempre y cuando no sea el usuario que inicio sesión ni los que ya han realizado órdenes dentro de la página.

    - Cambiar estatus de las órdenes que generen los clientes.

- Cada que se registre un nuevo usuario se mandara un correo electrónico a su correo para verificarlo.

___

**Extras**

Se implementaron las siguientes funcionalidades extras dentro del programa:

- Se creo una tabla llamada **images** y su respectivo modelo **Image** con la finalidad de poder tener una relación uno a muchos polimórfica con los modelos **Authors** y **Books**.

- El sistema **genera un documento pdf** por cada orden que se haya pagado y se encuentre en el estatus "recibido", "enviado", y "entregado".

- Se implemento la siguiente tarea recurrente:

    - Si el cliente realiza una orden y no la paga dentro de 2 minutos, esa orden cambiara su estado a orden anulada y hará esto de manera automática mientras se ejecute el código que se muestra a continuación una vez iniciado el sistema.

        `php artisan schedule:work`

- Se implemento un sistema de pago en PayPal y para poder utilizarlo escribí dentro del **.env.example** las siguientes variables:
  - **PAYPAL_CLIENT_ID =** 
  - **PAYPAL_SECRET =** 

- Para obtener estas variables seguí los siguientes pasos:

    1. Tener una cuenta en PayPal.
    2. Iniciar sesión en [Paypal developer](https://developer.paypal.com/home)
    3. Di click al botón **Create App**
    4. Ingrese el nombre de mi aplicación y en **Sandbox Business Account** seleccione el correo con terminación **@business.example.co** y procedí a dar click al botón **Create App**
    5. De manera automática me abre un modal y me muestra la variable **CLIENT_ID** y **SECRET** , estas variables se guardan en el archivo **.env**.
    6. Por último para obtener el correo y su respectiva contraseña falsa que se utilizara dentro de la aplicación, se tiene que ir a la sección **SANDBOX** y seleccionar **Accounts**.
    7. Dentro de **Accounts** hay dos cuentas y utilice la cuenta con terminación **@personal.example**, le di click al botón con los tres puntos y seleccione la opción **View/Edit Account** esta opción abría un modal con los datos de la cuenta, **correo electrónico falso con terminación "@personal.example.com"** y su **contraseña, que esta generada por el sistema**, esta cuenta es la que se ingresara para generar el pago de los libros.
    
    **Nota:**
    
    La cuenta viene con un saldo predeterminado, si se realizan varios pagos puede que llegue a ceros, en caso de que suceda esto y ya no genere mas compras tendrá que ir a la sección de **funding** como lo hizo en el paso 7 y aumentar el numero en la sección **Balance**.

___

**Autor**

- Alejandro Gaytán
