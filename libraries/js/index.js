$(document).ready(function(){
  $(document).on('click','#btnAgregarProducto',function(){
    contadorProductos++;
    $("#contenedorProductos").append(`
      <div class="row" id="producto${contadorProductos}">
        <div class="col-md-4">
          <div class="form-floating">
            <input type="text" class="form-control" id="nombreProducto${contadorProductos}" name="nombreProducto${contadorProductos}" placeholder="Ej: Jabon de manos" required>
            <label for="floatingInputGrid">Nombre del producto<span class='texto-rojo'>*</span></label>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-floating">
            <input type="number" class="form-control" id="cantidadProducto${contadorProductos}" name="cantidadProducto${contadorProductos}" placeholder="Ej: 2" required>
            <label for="floatingInputGrid">Cantidad<span class='texto-rojo'>*</span></label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-floating">
            <input type="number" class="form-control" id="precioProducto${contadorProductos}" name="precioProducto${contadorProductos}" placeholder="Ej: 100" required>
            <label for="floatingInputGrid">Precio unidad<span class='texto-rojo'>*</span></label>
          </div>
        </div>
        <div class="col-md-1 d-flex justify-content-center align-items-center">
          <button type='button' class="btn btn-danger" data-id='${contadorProductos}' id='btnEliminarProducto'>-</button>
        </div>
      </div>
    `);
  });
  $(document).on('click','#btnEliminarProducto',function(){
    let productoAsociado = $(this).data('id');
    $("#producto"+productoAsociado).remove();
  });
});