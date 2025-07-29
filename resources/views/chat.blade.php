<x-layouts.app>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'chat-primary': '#6366f1',
                        'chat-secondary': '#e0e7ff',
                        'chat-gray': '#f3f4f6'
                    }
                }
            }
        }
    </script>
    <style>
        .scrollbar-thin::-webkit-scrollbar { width: 4px; }
        .scrollbar-thin::-webkit-scrollbar-track { background: #f1f1f1; }
        .scrollbar-thin::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 10px; }
        .scrollbar-thin::-webkit-scrollbar-thumb:hover { background: #a8a8a8; }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-80 bg-white border-r border-gray-200 flex flex-col">
            <!-- Header avec profil -->
            <div class="p-4 border-b border-gray-200">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" 
                             alt="Profile" class="w-10 h-10 rounded-full">
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-600 text-sm">👋</span>
                            <span class="text-gray-600 text-sm">☎️</span>
                            <span class="text-gray-600 text-sm">🔍</span>
                            <span class="text-gray-600 text-sm">⋯</span>
                        </div>
                    </div>
                </div>
                
                <!-- Barre de recherche -->
                <div class="relative">
                    <input type="text" 
                           placeholder="Search or start a new chat" 
                           class="w-full pl-10 pr-4 py-2 bg-gray-100 rounded-lg text-sm focus:outline-none focus:bg-white focus:ring-2 focus:ring-chat-primary">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Liste des chats -->
            <div class="flex-1 overflow-y-auto scrollbar-thin">
                <!-- Section Chats -->
                <div class="p-4">
                    <h3 class="text-sm font-medium text-chat-primary mb-3">Chats</h3>
                    
                    <!-- Autres chats -->
                    <div class="hover:bg-gray-50 rounded-lg p-3 mb-2 cursor-pointer">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face" 
                                     alt="Kristopher" class="w-10 h-10 rounded-full">
                                <div class="absolute bottom-0 right-0 w-3 h-3 bg-red-500 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-start">
                                    <h4 class="font-medium text-sm text-gray-900">Kristopher Candy</h4>
                                    <span class="text-xs text-gray-500">9:09 AM</span>
                                </div>
                                <p class="text-xs text-gray-500 truncate">Cake pie jelly jelly beans. Ma...</p>
                            </div>
                        </div>
                    </div>

                    <div class="hover:bg-gray-50 rounded-lg p-3 mb-2 cursor-pointer">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=40&h=40&fit=crop&crop=face" 
                                     alt="Sarah" class="w-10 h-10 rounded-full">
                                <div class="absolute bottom-0 right-0 w-3 h-3 bg-orange-500 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-start">
                                    <h4 class="font-medium text-sm text-gray-900">Sarah Woods</h4>
                                    <span class="text-xs text-gray-500">5:48 PM</span>
                                </div>
                                <p class="text-xs text-gray-500 truncate">Cake pie jelly jelly beans. Ma...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section Contacts -->
                <div class="p-4 border-t border-gray-100">
                    <h3 class="text-sm font-medium text-chat-primary mb-3">Contacts</h3>
                    
                    <div class="hover:bg-gray-50 rounded-lg p-3 cursor-pointer">
                        <div class="flex items-center space-x-3">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=40&h=40&fit=crop&crop=face" 
                        alt="Jenny" class="w-10 h-10 rounded-full">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-medium text-sm text-gray-900">Jenny Perich</h4>
                                <p class="text-xs text-gray-500 truncate">Tart dragée carrot cake chocolate b...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Zone de chat principale -->
        <div class="flex-1 flex flex-col">
            <!-- Header du chat -->
            <div class="bg-white border-b border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face" 
                             alt="Kristopher Candy" class="w-10 h-10 rounded-full">
                        <div>
                            <h2 class="font-medium text-gray-900">Kristopher Candy</h2>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 text-gray-500">
                        <button class="hover:text-gray-700">📞</button>
                        <button class="hover:text-gray-700">📹</button>
                        <button class="hover:text-gray-700">🔍</button>
                        <button class="hover:text-gray-700">⋯</button>
                    </div>
                </div>
            </div>

            <!-- Messages -->
            <div class="flex-1 overflow-y-auto p-4 space-y-4 scrollbar-thin">
                <!-- Message reçu -->
                <div class="flex items-start space-x-3">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=32&h=32&fit=crop&crop=face" 
                         alt="Kristopher" class="w-8 h-8 rounded-full mt-1">
                    <div class="bg-white rounded-lg p-3 shadow-sm max-w-xs">
                        <p class="text-sm text-gray-800">It's perfect for my next project.</p>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=32&h=32&fit=crop&crop=face" 
                         alt="Kristopher" class="w-8 h-8 rounded-full mt-1">
                    <div class="bg-white rounded-lg p-3 shadow-sm max-w-xs">
                        <p class="text-sm text-gray-800">How can I purchase it?</p>
                    </div>
                </div>

                <!-- Message envoyé -->
                <div class="flex justify-end">
                    <div class="bg-chat-primary text-white rounded-lg p-3 max-w-xs">
                        <p class="text-sm">Thanks, from ThemeForest.</p>
                    </div>
                </div>

                <!-- Message avec emoji -->
                <div class="flex items-start space-x-3">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=32&h=32&fit=crop&crop=face" 
                         alt="Kristopher" class="w-8 h-8 rounded-full mt-1">
                    <div class="bg-white rounded-lg p-3 shadow-sm max-w-xs">
                        <p class="text-sm text-gray-800">I will purchase it for sure. 👍</p>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=32&h=32&fit=crop&crop=face" 
                         alt="Kristopher" class="w-8 h-8 rounded-full mt-1">
                    <div class="bg-white rounded-lg p-3 shadow-sm max-w-xs">
                        <p class="text-sm text-gray-800">Thanks.</p>
                    </div>
                </div>

                <!-- Messages envoyés -->
                <div class="flex justify-end">
                    <div class="bg-chat-primary text-white rounded-lg p-3 max-w-xs">
                        <p class="text-sm">Great, Feel free to get in touch on</p>
                    </div>
                </div>

                <div class="flex justify-end">
                    <div class="bg-chat-primary text-white rounded-lg p-3 max-w-xs">
                        <p class="text-sm text-blue-200 underline">https://pixinvent.ticksy.com/</p>
                    </div>
                </div>
            </div>

            <!-- Zone de saisie -->
            <div class="bg-white border-t border-gray-200 p-4">
                <div class="flex items-center space-x-3">
                    <button class="text-gray-500 hover:text-gray-700">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    
                    <div class="flex-1 relative">
                        <input type="text" 
                               placeholder="Type your message or use speech to text" 
                               class="w-full px-4 py-2 bg-gray-100 rounded-full text-sm focus:outline-none focus:bg-white focus:ring-2 focus:ring-chat-primary">
                        <button class="absolute right-3 top-2 text-gray-400 hover:text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <button class="bg-chat-primary text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-chat-primary focus:ring-offset-2">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Script pour rendre l'interface interactive (optionnel)
        document.addEventListener('DOMContentLoaded', function() {
            const chatItems = document.querySelectorAll('.cursor-pointer');
            chatItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Retirer la classe active de tous les éléments
                    chatItems.forEach(i => i.classList.remove('bg-chat-primary', 'text-white'));
                    // Ajouter la classe active à l'élément cliqué
                    this.classList.add('bg-chat-primary', 'text-white');
                });
            });

            // Auto-scroll vers le bas des messages
            const messagesContainer = document.querySelector('.overflow-y-auto.p-4');
            if (messagesContainer) {
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
        });
    </script>
</body>
</html>
</x-layouts.app>