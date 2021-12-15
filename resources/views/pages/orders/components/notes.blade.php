<div class="card card-custom" style="margin-bottom: 20px" id="notes">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Order Notes
            </h3>
        </div>
    </div>

    <div class="card-body">

        <div class="row">
            @forelse($order->notes as $note)
                <div class="col-lg-2">
                    <h4>{{$note->type}}</h4>
                    <p class="text-muted">{{ \Carbon\Carbon::parse($note->created_at)->format('d-m-Y H:i:s')}}</p>
                </div>
                <div class="col-lg-10">
                    <p>{{ $note->message }}</p>
                </div>
            @empty
                <p>There are no notes on this order</p>
            @endforelse
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h4>Create a new note</h4>
                <form action="{{ route('admin.order-notes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Note type</label>
                        <div class="col-10">
                            <select class="form-control" name="note_type">
                                <option selected disabled>Select a note type</option>
                                <option value="enquiry">Enquiry</option>
                                <option value="complaint">Complaint</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label"> Note  </label>
                        <div class="col-10">
                            <textarea rows="7" class="form-control" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label"></label>
                        <div class="col-10">
                            <button type="submit" class="btn btn-primary">Submit note</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

</div>
