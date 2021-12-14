<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="card-body">
        <form method="post" action="{{ route('penjualan.store') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="row align-items-center">
                        <div class="col-lg-4 ">
                            <Label>Nama Pembeli : </Label>
                            <input type="text" name="namapembeli" class="form-control m-input">
                        </div>
                        <div class="col-lg-4 ">
                            <Label>Tanggal Transaksi : </Label>
                            <input type="date" name="tanggalpenjualan" class="form-control m-input">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="inputFormRow">
                        <div class="input-group mb-3">
                            <div class="col">
                                <select name="produk[]" class="form-control m-input" id="">
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk['id'] }}">{{ $produk['nama_produk'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" name="banyakbarang[]" class="form-control m-input"
                                    placeholder="Banyak barang" autocomplete="off">
                            </div>
                            <div class="col">
                                <input type="text" name="" value="" class="form-control m-input" placeholder="Harga"
                                    disabled autocomplete="off">
                            </div>
                            <div class="col">
                                <input type="text" value="" name="" class="form-control m-input" placeholder="Stok"
                                    disabled autocomplete="off">
                            </div>
                            <div class="col">
                                <input type="text" name="subtotal[]" value="" disabled class="form-control m-input"
                                    placeholder="Subtotal" autocomplete="off">
                            </div>

                            <div class="input-group-append">
                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </div>

                    <div id="newRow"></div>
                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                    <button id="" type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>


    <script type="text/javascript">
        // add row
        $("#addRow").click(function() {
            var html = `<div id="inputFormRow">
                            <div class="input-group mb-3">
                                <div class="col">
                                    <select name="produk[]" class="form-control m-input" id="">
                                        @foreach ($produks as $produk)
                                            <option value="{{ $produk['id'] }}">{{ $produk['nama_produk'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" name="banyakbarang[]" class="form-control m-input"
                                        placeholder="Banyak barang" autocomplete="off">
                                </div>
                                <div class="col">
                                    <input type="text" name="" value="" class="form-control m-input" placeholder="Harga"
                                        disabled autocomplete="off">
                                </div>
                                <div class="col">
                                    <input type="text" value="" name="" class="form-control m-input" placeholder="Stok"
                                        disabled autocomplete="off">
                                </div>
                                <div class="col">
                                    <input type="text" name="subtotal[]" value="" disabled class="form-control m-input"
                                        placeholder="Subtotal" autocomplete="off">
                                </div>

                                <div class="input-group-append">
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>`;

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
</body>

</html>
