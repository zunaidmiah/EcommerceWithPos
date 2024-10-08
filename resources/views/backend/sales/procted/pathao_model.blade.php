<div class="modal fade pathao_model" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pathao Detalse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label ">City</label>
                        <select  class="form-control mb-3 pathao_city  rounded-0 " id="pathao_city" data-live-search="true" required>
                            <option value="">-- Select --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Zone</label>
                        <select  class="form-control mb-3 pathao_zone rounded-0" id="pathao_zone" required >
                            <option value="">-- Select --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Area</label>
                        <select  class="form-control pathao_area mb-3 rounded-0 "  id="pathao_area" required>
                            <option value="">-- Select --</option>
                        </select>
                    </div>
                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="pathao_submit" class="btn btn-primary pathao_submit">Send</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade pathao_model" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label ">Change Status</label>
                        <select class="form-control delivery_status " name="delivery_status" id="delivery_status">
                            <option value="">{{ translate('Filter by Delivery Status') }}</option>
                            <option value="pending" @if ($delivery_status == 'pending') selected @endif>{{ translate('Pending') }}
                            </option>
                            <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>
                                {{ translate('Confirmed') }}</option>
                            <option value="picked_up" @if ($delivery_status == 'picked_up') selected @endif>
                                {{ translate('Picked Up') }}</option>
                            <option value="on_the_way" @if ($delivery_status == 'on_the_way') selected @endif>
                                {{ translate('On The Way') }}</option>
                            <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>
                                {{ translate('Delivered') }}</option>
                            <option value="cancelled" @if ($delivery_status == 'cancelled') selected @endif>
                                {{ translate('Cancel') }}</option>
                        </select>
                    </div>
                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="status_submit" class="btn btn-primary pathao_submit">Send</button>
            </div>
        </div>
    </div>
</div>