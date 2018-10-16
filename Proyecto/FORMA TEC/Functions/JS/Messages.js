
  function Mensaje_Succes(texto){
    toastr.success(texto);
    toastr.options.showEasing = swing;
    toastr.options.hideEasing = linear;
    toastr.options.showMethod = fadeIn;
    toastr.options.hideMethod = fadeOut;
  }

  function Mensaje_Error(texto){
    toastr.error(texto);
    toastr.options.showEasing = swing;
    toastr.options.hideEasing = linear;
    toastr.options.showMethod = fadeIn;
    toastr.options.hideMethod = fadeOut;
  }

  function Mensaje_Warning(texto)
  {
    toastr.warning(texto);
    toastr.options.showEasing = swing;
    toastr.options.hideEasing = linear;
    toastr.options.showMethod = fadeIn;
    toastr.options.hideMethod = fadeOut;
  }
