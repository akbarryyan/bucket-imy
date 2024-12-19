<!-- Right Sidebar (Theme Settings) -->
<div>
    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
         <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
              <h5 class="text-white m-0">Theme Settings</h5>
              <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>

         <div class="offcanvas-body p-0">
              <div data-simplebar class="h-100">
                   <div class="p-3 settings-bar">

                        <div>
                             <h5 class="mb-3 font-16 fw-semibold">Color Scheme</h5>

                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light" value="light">
                                  <label class="form-check-label" for="layout-color-light">Light</label>
                             </div>

                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark" value="dark">
                                  <label class="form-check-label" for="layout-color-dark">Dark</label>
                             </div>
                        </div>

                        <div>
                             <h5 class="my-3 font-16 fw-semibold">Topbar Color</h5>

                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light" value="light">
                                  <label class="form-check-label" for="topbar-color-light">Light</label>
                             </div>
                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                  <label class="form-check-label" for="topbar-color-dark">Dark</label>
                             </div>
                        </div>


                        <div>
                             <h5 class="my-3 font-16 fw-semibold">Menu Color</h5>

                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-light" value="light">
                                  <label class="form-check-label" for="leftbar-color-light">
                                       Light
                                  </label>
                             </div>

                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-menu-color" id="leftbar-color-dark" value="dark">
                                  <label class="form-check-label" for="leftbar-color-dark">
                                       Dark
                                  </label>
                             </div>
                        </div>

                        <div>
                             <h5 class="my-3 font-16 fw-semibold">Sidebar Size</h5>

                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-default" value="default">
                                  <label class="form-check-label" for="leftbar-size-default">
                                       Default
                                  </label>
                             </div>

                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-small" value="condensed">
                                  <label class="form-check-label" for="leftbar-size-small">
                                       Condensed
                                  </label>
                             </div>

                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-hidden" value="hidden">
                                  <label class="form-check-label" for="leftbar-hidden">
                                       Hidden
                                  </label>
                             </div>

                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-small-hover-active" value="sm-hover-active">
                                  <label class="form-check-label" for="leftbar-size-small-hover-active">
                                       Small Hover Active
                                  </label>
                             </div>

                             <div class="form-check mb-2">
                                  <input class="form-check-input" type="radio" name="data-menu-size" id="leftbar-size-small-hover" value="sm-hover">
                                  <label class="form-check-label" for="leftbar-size-small-hover">
                                       Small Hover
                                  </label>
                             </div>
                        </div>

                   </div>
              </div>
         </div>
         <div class="offcanvas-footer border-top p-3 text-center">
              <div class="row">
                   <div class="col">
                        <button type="button" class="btn btn-danger w-100" id="reset-layout">Reset</button>
                   </div>
              </div>
         </div>
    </div>
</div>