<a data-target="#modal-{{$id}}" id="modal-{{$id}}" class=" button is-light is-small">Delete</a>

<div class="modal modal-{{ $id}}" id="modal-{{ $id }}">
    <div class="modal-background"></div>
    <div class="modal-card" style="width: 390px;">
        <header class="modal-card-head">
            <div class="modal-card-title">Delete Confirmation</div>
            <a class="delete" aria-label="close"></a>
        </header>
        <section class="modal-card-body">
            <div class="columns is-multiline is-mobile">
                <div class="column is-12">
                    <div class="delete-info">
                        <i class="fa fa-info-circle fa-3x"></i>

                        <p>
                            <small>You are about to delete <b>{{$name}}</b></small>
                            Are you sure ?
                        </p>
                    </div>
                </div>

            </div>
        </section>
        <footer class="modal-card-foot">
            <div class="columns" style="width: 100%;">
                <div class="column is-8">
                    <form action="{{ $action }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="button is-button-form is-danger is-delete">Yes please delete</button>
                    </form>
                </div>
                <div class="column">
                    <button class="cancel button is-button-form is-light is-delete">Cancel</button>
                </div>
            </div>


        </footer>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#modal-{{$id}}").click(function () {
            $(".modal-{{$id}}").addClass("is-active");
        });

        $(".delete").click(function () {
            $(".modal-{{$id}}").removeClass("is-active");
        });

        $(".cancel").click(function () {
            $(".modal-{{$id}}").removeClass("is-active");
        });
    });
</script>