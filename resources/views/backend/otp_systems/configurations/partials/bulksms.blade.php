<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('Bulk Sms Credential') }}</h5>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                <input type="hidden" name="otp_method" value="bulksms">
                @csrf
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="BULKSMS_API_KEY">
                    <div class="col-lg-3">
                        <label class="col-from-label">{{ translate('BULKSMS_API_KEY') }}</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="BULKSMS_API_KEY"
                            value="{{ env('BULKSMS_API_KEY') }}" placeholder="BULKSMS_API_KEY" required>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="hidden" name="types[]" value="BULKSMS_SENDER_ID">
                    <div class="col-lg-3">
                        <label class="col-from-label">{{ translate('BULKSMS_SENDER_ID') }}</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="BULKSMS_SENDER_ID"
                            value="{{ env('BULKSMS_SENDER_ID') }}" placeholder="BULKSMS_SENDER_ID" required>
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>