
@extends('master')
@section("content")
    <div class="custom-product">
        <div class="col-sm-10">


                <table class="table table-striped">

                  <tbody>
                    <tr>
                      <td>Amount</td>
                      <td>{{ $total }}</td>

                    </tr>
                    <tr>
                      <td>Tax</td>
                      <td>$ 0</td>
                    </tr>
                    <tr>
                      <td>Dilivery Charges</td>
                      <td>$ 0 </td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>$ 0</td>
                      </tr>
                  </tbody>
                </table>

        </div>
    </div>
    <div>
        <form id="payment-method" action="/order_place" method="POST">

            <div class="form-group">
                <textarea type="address" name="address" class="form-control" placeholder="Enter your Postal address" ></textarea>
            </div>
            @csrf
            <div class="form-group">
                <label for="paymentmetod">Payment Method</label>
              <input type="radio" value="cash" name="payment" ><span>Online Payment</span> <br><br>
              <input type="radio" value="cash" name="payment" ><span>EMI</span><br><br>
              <input type="radio" value="cash" name="payment" ><span>COD</span><br><br>
            </div>

            <button type="submit" class="btn btn-default">Order Now</button>
          </form>
    </div>
@endsection
