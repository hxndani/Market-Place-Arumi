<div class="container">
    <h3 class="title is-3">
        Sales
    </h3>
    <br />
    <div class="columns">
        <div class="column is-12">
            <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <div class="select is-fullwidth is-small">
                        <select name="salefilter">
                            <option>All Sale</option>
                            <option>With options</option>
                        </select>
                    </div>
                </div>
                <div class="control">
                    <button class="button is-link is-small js-modal-trigger" data-target="modal-sale">
                        <i class="icofont-plus-square"></i>
                        &nbsp;Sale
                    </button>
                </div>
                <div class="control">
                    <button class="button is-link is-small js-modal-trigger" data-target="modal-groupsale">
                        <i class="icofont-plus-square"></i>
                        &nbsp;Group Sale
                    </button>
                </div>
            </div>
            <table class="table is-fullwidth is-narrower">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Stock</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div id="modal-sale" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Sale</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <form method="post" action="<?= ($BASE) ?>/try/login" enctype="application/x-www-form-urlencoded" autocomplete="off">
            <section class="modal-card-body">
                <div id="sale-product">
                    <div class="columns">
                        <div class="column is-6">
                            <div class="field">
                                <label class="label">Product</label>
                                <div class="control">
                                    <input class="input is-small" type="text" name="product[]" placeholder="Stock" />
                                </div>
                            </div>
                        </div>
                        <div class="column is-2">
                            <div class="field">
                                <label class="label">Sale (%)</label>
                                <div class="control">
                                    <input class="input is-small" type="text" name="sale[]" placeholder="Stock" />
                                </div>
                            </div>
                        </div>
                        <div class="column is-3">
                            <div class="field">
                                <label class="label">Price</label>
                                <div class="control">
                                    <input class="input is-small disabled" type="text" name="price[]" placeholder="Stock" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="buttons is-right">
                    <a href="" class="button is-small" onclick="addProduct(); return false;">
                        <i class="icofont-lock"></i>
                        &nbsp;Add Product
                    </a>
                </div>
            </section>
            <footer class="modal-card-foot buttons is-right">
                <div class="buttons">
                    <button class="button is-success is-small">Next</button>
                </div>
            </footer>
        </form>
    </div>
</div>

<div id="modal-groupsale" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Group Sale</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <form method="post" action="<?= ($BASE) ?>/try/login" enctype="application/x-www-form-urlencoded" autocomplete="off">
            <section class="modal-card-body">
                <div class="columns">
                    <div class="column is-10 is-offset-1">
                        <div class="field">
                            <label class="label">Product</label>
                            <div class="control">
                                <input class="input is-small" type="text" name="code" placeholder="Stock" />
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Sale Date</label>
                            <div class="control">
                                <input class="input is-small" type="text" name="code" placeholder="Stock" />
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Sale Value</label>
                            <div class="control">
                                <input class="input is-small" type="text" name="name" placeholder="Stock" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <div class="buttons">
                    <button class="button is-success is-small">Save changes</button>
                    <button class="button is-small">Cancel</button>
                </div>
            </footer>
        </form>
    </div>
</div>

<script type="text/javascript">
    var wid = 0;
	function addProduct()
    {
		var objTo = document.getElementById('sale-product');
		var divproduct = document.createElement("div");
        var objId = 'block-' + wid.toString();
		divproduct.innerHTML = '<div id="' + objId + '" class="columns"><div class="column is-6"><div class="field"><div class="control"><input class="input is-small" type="text" name="product[]" placeholder="Stock" /></div></div></div><div class="column is-2"><div class="field"><div class="control"><input class="input is-small" type="text" name="sale[]" placeholder="Stock" /></div></div></div><div class="column is-3"><div class="field"><div class="control"><input class="input is-small" type="text" name="price[]" placeholder="Stock" /></div></div></div><div class="column is-1"><div><a href="" class="button is-small" onclick="removeProduct(' + wid + '); return false;"><i class="icofont-bin"></i></a></div></div></div>';
		objTo.appendChild(divproduct);
        wid += 1;
	}

    function removeProduct(wid)
    {
        var objId = 'block-' + wid.toString();
        var objTo = document.getElementById(objId);

        objTo.innerHTML = "";
        objTo.remove();
    }
</script>