@foreach ($moneyboxes as $moneybox)
    <div class="card-body">
        <form action="{{ route('moneybox.addmoney', $moneybox->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <input type="number" name="additionalAmount" class="form-control" placeholder="Additional Amount">
                <button type="submit" class="btn btn-info">Update Moneybox</button>
            </div>
        </form>
    </div>
@endforeach


