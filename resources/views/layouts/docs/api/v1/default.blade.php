<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        @include('includes.docs.api.v1.head')
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-3" id="sidebar">
                    <div class="column-content">
                        <div class="search-header">
                            <img src="/assets/docs/api.v1/img/f2m2_logo.svg" class="logo" alt="Logo" />
                            <input id="search" type="text" placeholder="Search">
                        </div>
                        <ul id="navigation">

                            <li><a href="#introduction">Introduction</a></li>

                            

                            <li>
                                <a href="#login">login</a>
                                <ul>
									<li><a href="#login_getCurrentUser">getCurrentUser</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#"></a>
                                <ul>
									<li><a href="#_getEmployees">getEmployees</a></li>

									<li><a href="#_createEmployee">createEmployee</a></li>

									<li><a href="#_getEmployeeID">getEmployeeID</a></li>

									<li><a href="#_updateEmployee">updateEmployee</a></li>

									<li><a href="#_getPosition">getPosition</a></li>

									<li><a href="#_createPosition">createPosition</a></li>

									<li><a href="#_getPositionByID">getPositionByID</a></li>

									<li><a href="#_updatePosition">updatePosition</a></li>

									<li><a href="#_deletePosition">deletePosition</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#Branch">Branch</a>
                                <ul>
									<li><a href="#Branch_getBranches">getBranches</a></li>

									<li><a href="#Branch_createBranch">createBranch</a></li>

									<li><a href="#Branch_getBranchByID">getBranchByID</a></li>

									<li><a href="#Branch_updateBranch">updateBranch</a></li>

									<li><a href="#Branch_deleteBranch">deleteBranch</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#User">User</a>
                                <ul>
									<li><a href="#User_getUsers">getUsers</a></li>

									<li><a href="#User_createUser">createUser</a></li>

									<li><a href="#User_getAllUsers">getAllUsers</a></li>

									<li><a href="#User_getUserID">getUserID</a></li>

									<li><a href="#User_updateUser">updateUser</a></li>

									<li><a href="#User_deleteUser">deleteUser</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#Bank">Bank</a>
                                <ul>
									<li><a href="#Bank_createBank">createBank</a></li>

									<li><a href="#Bank_getBanks">getBanks</a></li>

									<li><a href="#Bank_getBankByID">getBankByID</a></li>

									<li><a href="#Bank_updateBank">updateBank</a></li>

									<li><a href="#Bank_deleteBank">deleteBank</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#Account">Account</a>
                                <ul>
									<li><a href="#Account_getFunds">getFunds</a></li>

									<li><a href="#Account_getAcctTypes">getAcctTypes</a></li>

									<li><a href="#Account_getNorms">getNorms</a></li>

									<li><a href="#Account_getFS">getFS</a></li>

									<li><a href="#Account_createAccount">createAccount</a></li>

									<li><a href="#Account_createAccount">createAccount</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#SubAccount">SubAccount</a>
                                <ul>
									<li><a href="#SubAccount_getNorms">getNorms</a></li>

									<li><a href="#SubAccount_getAcctTypes">getAcctTypes</a></li>

									<li><a href="#SubAccount_getFunds">getFunds</a></li>

									<li><a href="#SubAccount_getFinStatements">getFinStatements</a></li>

									<li><a href="#SubAccount_createSubAcct">createSubAcct</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#Asset">Asset</a>
                                <ul>
									<li><a href="#Asset_getCategories">getCategories</a></li>

									<li><a href="#Asset_getPeriods">getPeriods</a></li>

									<li><a href="#Asset_createAsset">createAsset</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#BeginBal">BeginBal</a>
                                <ul>
									<li><a href="#BeginBal_createBeginBal">createBeginBal</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#CDV">CDV</a>
                                <ul>
									<li><a href="#CDV_createCDV">createCDV</a></li>

									<li><a href="#CDV_getBanks">getBanks</a></li>

									<li><a href="#CDV_getAccountNo">getAccountNo</a></li>

									<li><a href="#CDV_getCDVNum">getCDVNum</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#AppCDV">AppCDV</a>
                                <ul>
									<li><a href="#AppCDV_getCDVNo">getCDVNo</a></li>

									<li><a href="#AppCDV_getAcctEntries">getAcctEntries</a></li>

									<li><a href="#AppCDV_appCDV">appCDV</a></li>

									<li><a href="#AppCDV_denyCDV">denyCDV</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#SearchCDV">SearchCDV</a>
                                <ul>
									<li><a href="#SearchCDV_getCDVNo">getCDVNo</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#JV">JV</a>
                                <ul>
									<li><a href="#JV_createJV">createJV</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#AppJV">AppJV</a>
                                <ul>
									<li><a href="#AppJV_getJVNo">getJVNo</a></li>

									<li><a href="#AppJV_getAcctEntries">getAcctEntries</a></li>

									<li><a href="#AppJV_approveJV">approveJV</a></li>

									<li><a href="#AppJV_denyJV">denyJV</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#SearchJV">SearchJV</a>
                                <ul>
									<li><a href="#SearchJV_getJVNo">getJVNo</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#APV">APV</a>
                                <ul>
									<li><a href="#APV_createAPV">createAPV</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#AppAPV">AppAPV</a>
                                <ul>
									<li><a href="#AppAPV_getAPVNo">getAPVNo</a></li>

									<li><a href="#AppAPV_getAcctEntries">getAcctEntries</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#SearchAPV">SearchAPV</a>
                                <ul>
									<li><a href="#SearchAPV_getAPVNo">getAPVNo</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#Check">Check</a>
                                <ul>
									<li><a href="#Check_createCheck">createCheck</a></li>
</ul>
                            </li>


                            <li>
                                <a href="#PO">PO</a>
                                <ul>
									<li><a href="#PO_getPOLists">getPOLists</a></li>

									<li><a href="#PO_getBranch">getBranch</a></li>

									<li><a href="#PO_getBank">getBank</a></li>

									<li><a href="#PO_getBranchNames">getBranchNames</a></li>

									<li><a href="#PO_getUnit">getUnit</a></li>

									<li><a href="#PO_getSupplier2">getSupplier2</a></li>

									<li><a href="#PO_getMOP">getMOP</a></li>

									<li><a href="#PO_createPO">createPO</a></li>
</ul>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="col-9" id="main-content">

                    <div class="column-content">

                        @include('includes.docs.api.v1.introduction')

                        <hr />

                                                

                                                <a href="#" class="waypoint" name="login"></a>
                        <h2>login</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="login_getCurrentUser"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getCurrentUser</h3></li>
                            <li>api/v1/auth/user</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/auth/user" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name=""></a>
                        <h2></h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="_getEmployees"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getEmployees</h3></li>
                            <li>api/v1/employees</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/employees" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="_createEmployee"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createEmployee</h3></li>
                            <li>api/v1/employees</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/employees" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="_getEmployeeID"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getEmployeeID</h3></li>
                            <li>api/v1/employees/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/employees/{id}" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="_updateEmployee"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>PUT</h2></li>
                            <li><h3>updateEmployee</h3></li>
                            <li>api/v1/employees/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/employees/{id}" type="PUT">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="PUT"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="_getPosition"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getPosition</h3></li>
                            <li>api/v1/position</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/position" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="_createPosition"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createPosition</h3></li>
                            <li>api/v1/position</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/position" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="_getPositionByID"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getPositionByID</h3></li>
                            <li>api/v1/position/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/position/{id}" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="_updatePosition"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>PUT</h2></li>
                            <li><h3>updatePosition</h3></li>
                            <li>api/v1/position/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/position/{id}" type="PUT">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="PUT"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="_deletePosition"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>DELETE</h2></li>
                            <li><h3>deletePosition</h3></li>
                            <li>api/v1/position/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/position/{id}" type="DELETE">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="DELETE"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="Branch"></a>
                        <h2>Branch</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="Branch_getBranches"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getBranches</h3></li>
                            <li>api/v1/branches</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/branches" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Branch_createBranch"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createBranch</h3></li>
                            <li>api/v1/branches</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/branches" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Branch_getBranchByID"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getBranchByID</h3></li>
                            <li>api/v1/branches/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/branches/{id}" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Branch_updateBranch"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>PUT</h2></li>
                            <li><h3>updateBranch</h3></li>
                            <li>api/v1/branches/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/branches/{id}" type="PUT">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="PUT"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Branch_deleteBranch"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>DELETE</h2></li>
                            <li><h3>deleteBranch</h3></li>
                            <li>api/v1/branches/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/branches/{id}" type="DELETE">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="DELETE"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="User"></a>
                        <h2>User</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="User_getUsers"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getUsers</h3></li>
                            <li>api/v1/users</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/users" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="User_createUser"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createUser</h3></li>
                            <li>api/v1/users</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/users" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="User_getAllUsers"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getAllUsers</h3></li>
                            <li>api/v1/users/getUsers</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/users/getUsers" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="User_getUserID"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getUserID</h3></li>
                            <li>api/v1/users/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/users/{id}" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="User_updateUser"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>PUT</h2></li>
                            <li><h3>updateUser</h3></li>
                            <li>api/v1/users/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/users/{id}" type="PUT">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="PUT"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="User_deleteUser"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>DELETE</h2></li>
                            <li><h3>deleteUser</h3></li>
                            <li>api/v1/users/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/users/{id}" type="DELETE">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="DELETE"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="Bank"></a>
                        <h2>Bank</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="Bank_createBank"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createBank</h3></li>
                            <li>api/v1/bank</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/bank" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Bank_getBanks"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getBanks</h3></li>
                            <li>api/v1/bank</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/bank" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Bank_getBankByID"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getBankByID</h3></li>
                            <li>api/v1/bank/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/bank/{id}" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Bank_updateBank"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>PUT</h2></li>
                            <li><h3>updateBank</h3></li>
                            <li>api/v1/bank/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/bank/{id}" type="PUT">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="PUT"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Bank_deleteBank"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>DELETE</h2></li>
                            <li><h3>deleteBank</h3></li>
                            <li>api/v1/bank/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/bank/{id}" type="DELETE">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="DELETE"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="Account"></a>
                        <h2>Account</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="Account_getFunds"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getFunds</h3></li>
                            <li>api/v1/account</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/account" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Account_getAcctTypes"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getAcctTypes</h3></li>
                            <li>api/v1/account/getAcctTypes</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/account/getAcctTypes" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Account_getNorms"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getNorms</h3></li>
                            <li>api/v1/account/getNorms</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/account/getNorms" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Account_getFS"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getFS</h3></li>
                            <li>api/v1/account/getFS</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/account/getFS" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Account_createAccount"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>createAccount</h3></li>
                            <li>api/v1/account/getAccountTitles</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/account/getAccountTitles" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Account_createAccount"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createAccount</h3></li>
                            <li>api/v1/account</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/account" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="SubAccount"></a>
                        <h2>SubAccount</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="SubAccount_getNorms"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getNorms</h3></li>
                            <li>api/v1/SubAccount/getNorms</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/SubAccount/getNorms" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="SubAccount_getAcctTypes"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getAcctTypes</h3></li>
                            <li>api/v1/SubAccount/getAcctTypes</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/SubAccount/getAcctTypes" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="SubAccount_getFunds"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getFunds</h3></li>
                            <li>api/v1/SubAccount/getFunds</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/SubAccount/getFunds" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="SubAccount_getFinStatements"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getFinStatements</h3></li>
                            <li>api/v1/SubAccount/getFinStatements</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/SubAccount/getFinStatements" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="SubAccount_createSubAcct"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createSubAcct</h3></li>
                            <li>api/v1/SubAccount</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/SubAccount" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="Asset"></a>
                        <h2>Asset</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="Asset_getCategories"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getCategories</h3></li>
                            <li>api/v1/Assets</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/Assets" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Asset_getPeriods"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getPeriods</h3></li>
                            <li>api/v1/Assets/getPeriods</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/Assets/getPeriods" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="Asset_createAsset"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createAsset</h3></li>
                            <li>api/v1/Assets</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/Assets" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="BeginBal"></a>
                        <h2>BeginBal</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="BeginBal_createBeginBal"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createBeginBal</h3></li>
                            <li>api/v1/Balance</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/Balance" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="CDV"></a>
                        <h2>CDV</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="CDV_createCDV"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createCDV</h3></li>
                            <li>api/v1/CDV</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/CDV" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="CDV_getBanks"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getBanks</h3></li>
                            <li>api/v1/CDV/banks</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/CDV/banks" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="CDV_getAccountNo"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getAccountNo</h3></li>
                            <li>api/v1/CDV/accounts</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/CDV/accounts" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="CDV_getCDVNum"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getCDVNum</h3></li>
                            <li>api/v1/CDV/cdvnum</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/CDV/cdvnum" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="AppCDV"></a>
                        <h2>AppCDV</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="AppCDV_getCDVNo"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getCDVNo</h3></li>
                            <li>api/v1/AppCDV</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/AppCDV" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="AppCDV_getAcctEntries"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getAcctEntries</h3></li>
                            <li>api/v1/AppCDV/getAcctEntries/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/AppCDV/getAcctEntries/{id}" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="AppCDV_appCDV"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>PUT</h2></li>
                            <li><h3>appCDV</h3></li>
                            <li>api/v1/AppCDV/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/AppCDV/{id}" type="PUT">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="PUT"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="AppCDV_denyCDV"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>PUT</h2></li>
                            <li><h3>denyCDV</h3></li>
                            <li>api/v1/AppCDV/denyCDV/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/AppCDV/denyCDV/{id}" type="PUT">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="PUT"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="SearchCDV"></a>
                        <h2>SearchCDV</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="SearchCDV_getCDVNo"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getCDVNo</h3></li>
                            <li>api/v1/Search</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/Search" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="JV"></a>
                        <h2>JV</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="JV_createJV"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createJV</h3></li>
                            <li>api/v1/JV</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/JV" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="AppJV"></a>
                        <h2>AppJV</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="AppJV_getJVNo"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getJVNo</h3></li>
                            <li>api/v1/appJV</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/appJV" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="AppJV_getAcctEntries"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getAcctEntries</h3></li>
                            <li>api/v1/appJV/getAcctEntries/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/appJV/getAcctEntries/{id}" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="AppJV_approveJV"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>PUT</h2></li>
                            <li><h3>approveJV</h3></li>
                            <li>api/v1/appJV/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/appJV/{id}" type="PUT">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="PUT"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="AppJV_denyJV"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>PUT</h2></li>
                            <li><h3>denyJV</h3></li>
                            <li>api/v1/appJV/denyJV/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/appJV/denyJV/{id}" type="PUT">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="PUT"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="SearchJV"></a>
                        <h2>SearchJV</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="SearchJV_getJVNo"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getJVNo</h3></li>
                            <li>api/v1/SearchJV</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/SearchJV" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="APV"></a>
                        <h2>APV</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="APV_createAPV"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createAPV</h3></li>
                            <li>api/v1/APV</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/APV" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="AppAPV"></a>
                        <h2>AppAPV</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="AppAPV_getAPVNo"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getAPVNo</h3></li>
                            <li>api/v1/appAPV</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/appAPV" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="AppAPV_getAcctEntries"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getAcctEntries</h3></li>
                            <li>api/v1/appAPV/getAcctEntries/{id}</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/appAPV/getAcctEntries/{id}" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="SearchAPV"></a>
                        <h2>SearchAPV</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="SearchAPV_getAPVNo"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getAPVNo</h3></li>
                            <li>api/v1/SearchAPV</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/SearchAPV" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="Check"></a>
                        <h2>Check</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="Check_createCheck"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>createCheck</h3></li>
                            <li>api/v1/check</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/check" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>
                        

                                                <a href="#" class="waypoint" name="PO"></a>
                        <h2>PO</h2>
                        <p></p>

                        
                        <a href="#" class="waypoint" name="PO_getPOLists"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getPOLists</h3></li>
                            <li>api/v1/PO</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/PO" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="PO_getBranch"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getBranch</h3></li>
                            <li>api/v1/PO/getBranch</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/PO/getBranch" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="PO_getBank"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getBank</h3></li>
                            <li>api/v1/PO/getBank</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/PO/getBank" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="PO_getBranchNames"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getBranchNames</h3></li>
                            <li>api/v1/PO/getBranchNames</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/PO/getBranchNames" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="PO_getUnit"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getUnit</h3></li>
                            <li>api/v1/PO/getUnit</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/PO/getUnit" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="PO_getSupplier2"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getSupplier2</h3></li>
                            <li>api/v1/PO/getSupplier2</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/PO/getSupplier2" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="PO_getMOP"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>GET</h2></li>
                            <li><h3>getMOP</h3></li>
                            <li>api/v1/PO/getMOP</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/PO/getMOP" type="GET">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="GET"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>

                        <a href="#" class="waypoint" name="PO_createPO"></a>
                        <div class="endpoint-header">
                            <ul>
                            <li><h2>POST</h2></li>
                            <li><h3>createPO</h3></li>
                            <li>api/v1/PO</li>
                          </ul>
                        </div>

                        <div>
                          <p class="endpoint-short-desc"></p>
                        </div>
                       <!--  <div class="parameter-header">
                             <p class="endpoint-long-desc"></p>
                        </div> -->
                        <form class="api-explorer-form" uri="api/v1/PO" type="POST">
                          <div class="endpoint-paramenters">
                            
                          </div>
                           <div class="generate-response" >
                              <!-- <input type="hidden" name="_method" value="POST"> -->
                              <input type="submit" class="generate-response-btn" value="Generate Example Response">
                          </div>
                        </form>
                        <hr>


                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
