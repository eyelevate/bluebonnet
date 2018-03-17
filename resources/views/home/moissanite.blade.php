@extends($layout)
@section('scripts')
@endsection
@section('header')
@endsection


@section('content')

<style>
        .gemstone-tables-container
        {
            display:-webkit-flex;
            display:-ms-flexbox;
            display:-ms-flex;
            display:flex;
            -webkit-flex-wrap:wrap;
            -ms-flex-wrap:wrap;
            flex-wrap:wrap;margin-left:-3px
        }
        .gemtstone-table-container
        {
            -webkit-flex:1 1 25%;
            -ms-flex:1 1 25%;
            flex:1 1 25%;
            padding:0 3px;
            display:-webkit-flex;
            display:-ms-flexbox;
            display:-ms-flex;
            display:flex;
            -webkit-flex-direction:column;
            -ms-flex-direction:column;
            flex-direction:column
        }
            @media (max-width:768px)
            {
        .gemtstone-table-container
        {
            -webkit-flex:1 1 50%;
            -ms-flex:1 1 50%;
            flex:1 1 50%}
        }
        @media (max-width:480px)
        {
            .gemtstone-table-container
            {
                -webkit-flex:1 1 100%;
                -ms-flex:1 1 100%;
                flex:1 1 100%
            }
         }
         .table-header-container
         {
             -webkit-flex:1;
             -ms-flex:1;
             flex:1;
             -webkit-justify-content:center;
             -ms-justify-content:center;
             justify-content:center;
             -webkit-align-items:center;
             -ms-align-items:center;
             align-items:center
            }
            .gemstone-table-header
            {
                font-size:1.4rem;
                font-weight:bold
            }
            .gemstone-comparison-table
            {
                table-layout:fixed;
                border-spacing:0 2px;
                border-collapse:separate;
                font-family:Arial,Helvetica,sans-serif;
                letter-spacing:.036em;
                text-transform:uppercase;
                margin-bottom:18px}
                
                @media (max-width:768px)
                {
                    .gemstone-comparison-table
                    {
                        margin-bottom:39px
                    }
                }
                .gemstone-comparison-table th
                {
                    background-color:#9bf5ff;
                    font-weight:400;
                    font-size:1.1rem
                }
                .gemstone-comparison-table th span
                {
                    font-weight:bold
                }
                .gemstone-comparison-table tbody td
                {
                    background-color:#edf0f2;
                    text-transform:uppercase;
                    font-size:1.1rem;
                    padding:1.6em .5em
                }
                .gemstone-comparison-table tbody td span
                {
                    font-weight:bold
                }
                .gemstone-footnote
                {
                    font-size:1rem
                }
               
</style>
<div class="container main content">

  <section id="section-1" class="section">

    <div class="row">    
      <div class="col-12 text-center">
        <h2 class="h2">Why Moissanite?</h2>
        <hr>
            </div>
    </div>
    <div class="row">
            <div class="col-2">
                </div>
            <div class="col-8 text-center">
                    <p>
                    Moissanite is a rare, naturally-occuring gemstone that is typically
                    found in very small quantities in meteorites, corundum deposits, and
                    kimberlite.
                    Moissanite is also brighter and has more fire than diamond.
                    Simply the <strong>BEST DIAMOND ALTERNATIVE.</strong>
                    <p>
                </div>
                <div class="col-2">
                    </div>
  </section>

  <div class="widget block block-static-block"><div class="cc-container"><section class="gemstone-comparison-section bordered block-section">
        <div class="block-content-wrapper">
        <p class="h3 text-center">Diamond and Moissanite Comparison</p>
        <div class="gemstone-tables-container">
        <div class="gemtstone-table-container">
        <div class="table-header-container">
        <h3 class="text-center gemstone-table-header">Brilliance Refraction Index (RI)</h3>
        </div>
        <div>
        <table class="text-center gemstone-comparison-table">
        <thead>
        <tr><th class="text-center">Our Moissanite's Refraction Index:<br /> <span>2.65</span></th></tr>
        </thead>
        <tbody>
        <tr>
        <td>Diamond: <span>2.42</span></td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        <div class="gemtstone-table-container">
        <div class="table-header-container">
        <h3 class="text-center gemstone-table-header">Fire Dispersion</h3>
        </div>
        <div>
        <table class="text-center gemstone-comparison-table">
        <thead>
        <tr><th class="text-center">Our Moissanite's Fire Dispersion:<br /> <span>0.104</span></th></tr>
        </thead>
        <tbody>
        <tr>
        <td>Diamond: <span>0.044</span></td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        <div class="gemtstone-table-container">
        <div class="table-header-container">
        <h3 class="text-center gemstone-table-header">Hardness Mohs Scale</h3>
        </div>
        <div>
        <table class="text-center gemstone-comparison-table">
        <thead>
        <tr><th class="text-center">Our Moissanite's Hardness:<br /> <span>9.25</span></th></tr>
        </thead>
        <tbody>
        <tr>
        <td>Diamond: <span>10</span></td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        <div class="gemtstone-table-container">
        <div class="table-header-container">
        <h3 class="text-center gemstone-table-header">Durability</h3>
        </div>
        <div>
        <table class="text-center gemstone-comparison-table">
        <thead>
        <tr><th class="text-center">Our Moissanite's Durability:<br /> <span>Excellent</span></th></tr>
        </thead>
        <tbody>
        <tr>
        <td>Diamond: <span>Excellent</span></td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        </div>
        

<hr>

</div>

<div class="row">    
          <div class="col-12 text-center">
                <h2 class="h2"> Price Comparison </h2>
          <h3><strong>1 ct F-VVS</strong></h3>
          <h3> Diamond : $6000-$8000 
              <br> Moissanite: $500</h3>
          <h3><strong>2 ct F-VVS</strong></h3>
          <h3>Diamond : $20000-$25000 <br> Moissanite: $1100</h3>


        </div>
<hr>

@endsection

@section('modals')

@endsection