<div id="diceRollModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
  <div class="flex items-center justify-center min-h-screen p-4 text-center sm:block">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-top sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <h3 class="text-lg leading-6 font-medium text-gray-900">20 Dice Roll</h3>
        <div class="mt-2">
          <p class="text-sm text-gray-500">
            You rolled a <span id="diceResult">--</span>.
          </p>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button id="rollDice" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
          Roll
        </button>
        <button id="closeDiceRollModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const diceRollModal = document.getElementById("diceRollModal");
  const rollDiceButton = document.getElementById("rollDice");
  const closeDiceRollModalButton = document.getElementById("closeDiceRollModal");
  const diceResultSpan = document.getElementById("diceResult");
  const openDiceRollModalButton = document.querySelectorAll(".diceMenu");

  // Function to generate a random dice roll result
  function rollDice() {
    const min = 1;
    const max = 20; // Change this to match your desired dice type
    const result = Math.floor(Math.random() * (max - min + 1)) + min;
    diceResultSpan.textContent = result;
  }

  // Event listeners to open and close the modal
  rollDiceButton.addEventListener("click", rollDice);
  closeDiceRollModalButton.addEventListener("click", function () {
    diceRollModal.classList.add("hidden");
  });

  // Open the modal when the "diceMenu" button is clicked
  openDiceRollModalButton.forEach(function (element) {
        element.addEventListener("click", function () {
            diceRollModal.classList.remove("hidden");
        });
    });
});


</script>