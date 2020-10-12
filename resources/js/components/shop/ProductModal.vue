<template>
  <div class="productModal">
      <div class="modal card-shadow fade" :id="`productModal-${id}`" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="modal-actions row">
                  <div class="col-6">
                      <a data-dismiss="modal">
                          <i class="fas fa-chevron-left"></i>
                      </a>
                  </div>
              </div>
              <div class="modal-image">
                  <img :src="`/img/products/${image}`"/>
              </div>
              <div class="modal-details">
                  <h4 class="product-title">
                      {{ name }}
                  </h4>
                  <h4 class="product-price">
                      Php {{ price }}
                  </h4>
                  <div class="product-size">
                      <h6>Size</h6>
                      <div class="size-group">
                          <input type="radio" :id="`${id}-2L`" name="product-size" value="2L" hidden checked/>
                          <label :for="`${id}-2L`" class="sizeSelect">2L</label>
                      </div>
                      <div class="size-group">
                          <input type="radio" :id="`${id}-500mL`" name="product-size" value="500mL" hidden/>
                          <label :for="`${id}-500mL`" class="sizeSelect">500mL</label>
                      </div>
                  </div>
                  <p>{{ description }}</p>
              </div>
            </div>
            <div class="modal-footer">
              <a class="addCart-btn btn btn-primary" data-dismiss="modal"><span>Add to Cart</span></a>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
  export default {
    props: ['name', 'price', 'image', 'id', 'description'],
  }
</script>