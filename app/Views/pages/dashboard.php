<!-- HEADER SIDEBAR -->
<div class="p-4 border-b">
  <h1 class="text-xl font-bold text-gray-800">
    Chat System
  </h1>
  <p class="text-sm text-gray-500">
    Internal Communication
  </p>
</div>

<!-- MENU -->
<nav class="p-4 space-y-2">

  <!-- MENU CHAT -->
  <button
    @click="menu='chat'"
    :class="menu === 'chat'
            ? 'bg-blue-500 text-white'
            : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
    class="w-full flex items-center gap-2 px-4 py-2 rounded transition">
    <span>💬</span>
    <span>Chat</span>
  </button>

  <!-- MENU LAPORAN -->
  <button
    @click="menu='laporan'"
    :class="menu === 'laporan'
            ? 'bg-blue-500 text-white'
            : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
    class="w-full flex items-center gap-2 px-4 py-2 rounded transition">
    <span>📊</span>
    <span>Laporan</span>
  </button>

</nav>

<!-- FOOTER SIDEBAR -->
<div class="absolute bottom-0 w-64 p-4 border-t bg-white">
  <div class="text-sm text-gray-500">
    Login sebagai
  </div>
  <div class="font-semibold text-gray-800">
    <? // = esc(user()->username ?? 'Admin') 
    ?>
  </div>
</div>