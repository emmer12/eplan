  <div class="calcultor">
    <h4 class="ui header">Title</h4>
    <div class="body">
      <form class="ui form calcultor-form" action="index.html" method="post">
        <div class="field">
          <label>Building Type</label>
          <select class="ui fluid dropdown rate" name="rate" required>
            <option value="">Select Building type</option>
            <option value="residential">residential</option>
            <option value="commercial">Commercial</option>
            <option value="filling_station">Filling Station</option>
          </select>
        </div>

      <div class="fields">
        <div class="field disabled">
          <label>Rate Based On Type</label>
          <input type="number" name="rate"  placeholder="rate" required>
        </div>
        <div class="field">
          <label>Length of the building</label>
          <input type="number" name="length" placeholder="Building Length" required>
        </div>
        <div class="field">
          <label>Breadth of the building </label>
          <input type="number" name="breadth" placeholder="Breadth" required>
        </div>
          <div class="field">
            <label>Building Height </label>
            <input type="number" name="height" placeholder="Height to the roof level" required>
          </div>
      </div>
      <button type="submit" class="ui button done">Done</button>
 {{-- Calculation Result Model --}}
      <div class="ui modal mini">
          <i class="close icon"></i>
          <div class="header">
            <div class="logo"> <h4>e</h4> </div>Assessment Calculation Result
          </div>
          <div class="image content">
            <div class="image">
                <i class="calculator icon"></i>
            </div>
            <div class="description">
              <table class="ui inverted unstackable table">
                <thead>
                  <tr>
                    <th colspan=2>Likely Assessment Payment</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Assessment</td>
                    <td class="total_accessment"></td>
                  </tr>
                  <tr>
                    <td>Allocation</td>
                    <td class="allocation"></td>
                  </tr>
                  <tr>
                    <td>Inspection</td>
                    <td class="inspection"></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr colspan="2"><th> <strong>Total</strong> </th>
                  <th class="total"></th>
                </tr></tfoot>
              </table>
            </div>
          </div>
          <div class="actions">
            <div class="ui button cancel red">Cancel</div>
            <div class="ui button ok">OK</div>
          </div>
        </div>

        {{-- Calculation Result Model End--}}


      </form>
    </div>

  </div>
