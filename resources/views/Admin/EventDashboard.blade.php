<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Event Dashboard' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/myscripts.js') }}" defer></script>
    <Script src="https://cdn.tailwindcss.com"></Script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex">

<div class="fixed hidden h-screen w-64 bg-gray-900 shadow-lg transition-all duration-300 ease-in-out md:block" id="sidebar">
    
    <div class="mt-10 flex flex-col items-center">
        <img class="h-16 w-16 rounded-full border-2 border-gray-500" src="{{ asset('..\img\admin.png')}}" alt="Admin Profile Picture">
        <h2 class="mt-2 text-lg font-semibold text-white">Admin Panel</h2>
    </div>

    <nav class="mt-6">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center rounded-md px-6 py-3 text-gray-300 transition hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="flex items-center rounded-md px-6 py-3 text-gray-300 transition hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-box mr-3"></i> Product Management
                </a>
            </li>
            <li>
                <a href="{{ route('events.index') }}" class="flex items-center rounded-md px-6 py-3 text-gray-300 transition hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-calendar-alt mr-3"></i> Event Management
                </a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fa-solid fa-truck-fast mr-3" style="color: #ffffff; "></i></i> Orders</a>
                </li>
            <li>
                <a href="{{ url('/logout') }}" class="flex items-center rounded-md px-6 py-3 text-red-400 transition hover:bg-red-600 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-3"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
</div>

<button class="fixed left-4 top-4 rounded-md bg-gray-800 p-2 text-white focus:outline-none md:hidden" id="menu-toggle">
    <i class="fas fa-bars"></i>
</button>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        let sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('hidden');
    });
</script>

<script src="https://kit.fontawesome.com/ee10af8ca1.js" crossorigin="anonymous"></script>


        <div class="ml-[330px] w-4/5 bg-gray-100 p-8">
            <header class="mb-1 mt-[20px] flex items-center justify-between rounded-lg bg-white p-4 shadow-md">
                <h1 class="text-2xl font-bold text-gray-700">Event Management Dashboard</h1>
                <div class="flex items-center">
                    <span class="mr-4 text-gray-700">Welcome, Admin</span>
                    <button class="rounded bg-gray-900 px-4 py-2 text-white">Logout</button>
                </div>
            </header>

            <div class="mb-6 rounded-lg bg-white p-6 shadow-md">
                <h2 class="mb-4 text-xl font-semibold text-gray-800">Manage Events</h2>
        
                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
                    @csrf
                    <h3 class="mb-4 text-lg font-semibold text-gray-700">Add Event</h3>
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <input type="text" id="eventName" name="eventName" class="w-full rounded border px-3 py-2" placeholder="Event Name" required>
                
                        <select id="eventType" name="eventType" class="w-full rounded border px-3 py-2" required>
                            <option value="" selected disabled>Select Event Type</option>
                            <option value="musical">Musical Show</option>
                            <option value="dancing">Dancing Show</option>
                            <option value="conference">Conference</option>
                            <option value="workshop">Workshop</option>
                        </select>
                
                        <input type="number" id="ticketPrice" name="ticketPrice" class="w-full rounded border px-3 py-2" placeholder="Ticket Price" required>
                        <input type="date" id="eventDate" name="eventDate" class="w-full rounded border px-3 py-2" required>
                
                        <div>
                            <label for="eventTime" class="block text-sm font-medium text-gray-700">Start Time</label>
                            <input type="time" id="eventTime" name="eventTime" class="w-full rounded border px-3 py-2" required>
                        </div>
                        <div>
                            <label for="endTime" class="block text-sm font-medium text-gray-700">End Time</label>
                            <input type="time" id="endTime" name="endTime" class="w-full rounded border px-3 py-2" required>
                        </div>
                
                        <input type="text" id="eventVenue" name="eventVenue" placeholder="Venue" class="w-full rounded border px-3 py-2" required>
                        <textarea name="eventDescription" class="w-full rounded border px-3 py-2" placeholder="Event Description" required></textarea>
                
                        <div id="artistsSection" class="mb-6">
                            <div id="artistFields" class="space-y-4">
                                <div class="flex items-center space-x-4">
                                    <input type="text" name="artists[]" placeholder="Artist Name" class="w-full rounded border px-3 py-2">
                                    <button type="button" class="add-artist inline-flex items-center rounded-md bg-green-500 px-3 py-1.5 text-white hover:bg-green-600">+</button>
                                </div>
                            </div>
                        </div>
                        
                        <input type="number" id="ticketQunatity" name="ticketQunatity" class="w-full rounded border px-3 py-2" placeholder="Ticket Qunatity" required>
                        

                        <div class="mx-auto w-full max-w-lg rounded border border-gray-300 bg-white p-6 shadow-md">
                            <div
                              id="dropZone"
                              class="flex h-40 flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 transition hover:border-blue-500"
                              ondragover="event.preventDefault()"
                              ondrop="handleFileDrop(event)"
                            >
                              <img
                                id="uploadIcon"
                                src="https://via.placeholder.com/50"
                                alt="Upload Icon"
                                class="mb-3 h-12 w-12"
                              />
                              <p id="uploadText" class="text-gray-600">
                                Drop your image here, or
                                <span
                                  class="cursor-pointer text-blue-500"
                                  onclick="document.getElementById('eventImage').click()"
                                  >browse</span
                                >
                              </p>
                              <p id="fileFormats" class="text-sm text-gray-400">
                                Supports: JPG, JPEG2000, PNG
                              </p>
                              <input
                                type="file"
                                name="eventImage"
                                id="eventImage"
                                accept="image/*"
                                class="hidden"
                                onchange="handleFileInput(event)"
                              />
                              <img
                                id="imagePreview"
                                class="hidden max-h-40 w-full rounded object-cover"
                                alt="Image Preview"
                              />
                            </div>
                          
                            <div id="progressContainer" class="mt-4 hidden">
                              <div class="mb-2 flex items-center justify-between">
                                <p class="text-sm text-gray-600">Uploading...</p>
                                <button
                                  id="cancelButton"
                                  onclick="cancelUpload()"
                                  class="text-sm text-red-500 hover:text-red-600"
                                >
                                  Cancel
                                </button>
                              </div>
                              <div class="relative h-2 w-full rounded bg-gray-200">
                                <div id="progressBar" class="absolute left-0 top-0 h-2 rounded bg-blue-500" style="width: 0%;"></div>
                              </div>
                              <p id="progressText" class="mt-1 text-sm text-gray-500">0% • 0 seconds left</p>
                            </div>
                          </div>
                          
                          <script>
                            let uploadInterval;
                            let uploadProgress = 0;
                          
                            function handleFileInput(event) {
                              const file = event.target.files[0];
                              if (file) {
                                displayImage(file);
                                startUpload(file);
                              }
                            }
                          
                            function handleFileDrop(event) {
                              event.preventDefault();
                              const file = event.dataTransfer.files[0];
                              if (file) {
                                displayImage(file);
                                startUpload(file);
                              }
                            }
                          
                            function displayImage(file) {
                              const reader = new FileReader();
                              reader.onload = function (e) {
                                const uploadIcon = document.getElementById('uploadIcon');
                                const uploadText = document.getElementById('uploadText');
                                const fileFormats = document.getElementById('fileFormats');
                                const imagePreview = document.getElementById('imagePreview');
                          
                                uploadIcon.classList.add('hidden');
                                uploadText.classList.add('hidden');
                                fileFormats.classList.add('hidden');
                          
                                imagePreview.src = e.target.result;
                                imagePreview.classList.remove('hidden');
                              };
                              reader.readAsDataURL(file);
                            }
                          
                            function startUpload(file) {
                              document.getElementById('progressContainer').classList.remove('hidden');
                              uploadProgress = 0;
                              updateProgress();
                              uploadInterval = setInterval(() => {
                                uploadProgress += 10;
                                updateProgress();
                                if (uploadProgress >= 100) {
                                  clearInterval(uploadInterval);
                                  document.getElementById('progressContainer').classList.add('hidden');
                                }
                              }, 500);
                            }
                          
                            function updateProgress() {
                              const progressBar = document.getElementById('progressBar');
                              const progressText = document.getElementById('progressText');
                              progressBar.style.width = `${uploadProgress}%`;
                              progressText.textContent = `${uploadProgress}% • ${5 - Math.floor(uploadProgress / 20)} seconds left`;
                            }
                          
                            function cancelUpload() {
                              clearInterval(uploadInterval);
                              uploadProgress = 0;
                              document.getElementById('progressContainer').classList.add('hidden');
                            }
                          </script>                   
                                           
                                           
                    </div>
                    <p class="border-1 py-1 text-[18px] font-bold text-red-600">Important: When Adding An Event, It Must Be 10 Days After The Date Of Adding The Event.</p>
                    <button class="rounded bg-green-500 px-4 py-2 text-white" type="submit">Add Event</button>
                </form>
            </div>

            <div class="rounded-lg bg-white p-6 shadow-md">
                <h3 class="mb-6 text-xl font-semibold text-gray-800">Events List</h3>
            
                <div class="grid grid-cols-1 gap-8 p-6 sm:grid-cols-2 lg:grid-cols-4">
                    @forelse($events as $event)
                    <div class="group relative flex flex-col overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 hover:shadow-2xl">
                        <div class="h-64 w-full">
                            <img class="object-cove h-full w-full" src="{{ asset('img/' . $event->eventImage) }}" alt="Event Image"/>
                        </div>
                
                        <div class="p-6 text-gray-800">
                            <h3 class="mb-2 text-xl font-semibold transition-colors duration-300 group-hover:text-blue-500">{{ $event->eventName }}</h3>
                            <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Date:</span> {{ $event->eventDate }}</p>
                            <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Venue:</span> {{ $event->eventVenue }}</p>
                            <p class="text-sm text-gray-600"><span class="font-semibold">Price:</span> LKR {{ number_format($event->ticketPrice, 2) }}</p>
                
                            <div class="mt-4 flex space-x-3">
                                
                                <button type="button" class="update-event-button rounded bg-blue-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-blue-600"
                                    data-id="{{ $event->_id }}">Update
                                </button>
                                
                                <form action="{{ route('events.destroy', $event->_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded bg-red-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                                            
                            <div class="event-update-form relative mt-4 hidden rounded-md bg-gray-100 p-4 shadow-md">
                                <button 
                                    class="absolute right-2 top-2 flex h-6 w-6 items-center justify-center rounded-full bg-red-500 text-white hover:bg-red-600" onclick="closeUpdateForm()" title="Close">×
                                </button>
                            
                                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                                <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <h3 class="mb-4 text-lg font-semibold text-gray-700">Update Event</h3>
                            
                                    <div class="grid grid-cols-2 gap-4">
                                        <input type="text" name="eventName" value="{{ $event->eventName }}" 
                                            class="w-full rounded border px-3 py-2" placeholder="Event Name" required>
                                        <select name="eventType" class="w-full rounded border px-3 py-2" required>
                                            <option value="musical" {{ $event->eventType == 'musical' ? 'selected' : '' }}>Musical Show</option>
                                            <option value="dancing" {{ $event->eventType == 'dancing' ? 'selected' : '' }}>Dancing Show</option>
                                            <option value="conference" {{ $event->eventType == 'conference' ? 'selected' : '' }}>Conference</option>
                                            <option value="workshop" {{ $event->eventType == 'workshop' ? 'selected' : '' }}>Workshop</option>
                                        </select>
                                        <input type="number" name="ticketPrice" value="{{ $event->ticketPrice }}" 
                                            class="w-full rounded border px-3 py-2" placeholder="Ticket Price" required>
                                        <input type="date" name="eventDate" value="{{ $event->eventDate }}" 
                                            class="w-full rounded border px-3 py-2" required>
                                        <input type="time" name="eventTime" value="{{ $event->eventTime }}" 
                                            class="w-full rounded border px-3 py-2" required>
                                        <input type="time" name="endTime" value="{{ $event->endTime }}" 
                                            class="w-full rounded border px-3 py-2" required>
                                        <input type="text" name="eventVenue" value="{{ $event->eventVenue }}" 
                                            class="w-full rounded border px-3 py-2" placeholder="Venue" required>
                                        <textarea name="eventDescription" class="w-full rounded border px-3 py-2" placeholder="Event Description" required>{{ $event->eventDescription }}</textarea>
                                        <input type="file" name="eventImage" class="w-full rounded border px-3 py-2">
                                        <input type="number" name="ticketQuantity" class="w-full rounded border px-3 py-2" placeholder="Ticket Quantity" required>
                                    </div>
                                    <button type="submit" class="mt-4 rounded bg-green-500 px-4 py-2 text-white">Update Event</button>
                                </form>
                            </div>
                        </div>
                    </div>
                
                    @empty
                    <p class="col-span-1 text-center text-gray-500 sm:col-span-2 lg:col-span-3">No events available.</p>
                    @endforelse
                </div>
            </div>
            </div>
        </div>
    </div>
    
    

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const eventType = document.getElementById('eventType');
            const artistsSection = document.getElementById('artistsSection');
            const artistFields = document.getElementById('artistFields');
            const eventDate = document.getElementById('eventDate');
    
            // Set the minimum date (10 days from today)
            const today = new Date();
            const minDate = new Date();
            minDate.setDate(today.getDate() + 10); // Add 10 days
    
            const minDateString = minDate.toISOString().split('T')[0]; 
            eventDate.min = minDateString;
    
            eventType.addEventListener('change', () => {
                const selectedType = eventType.value;
                if (selectedType === 'musical' || selectedType === 'dancing') {
                    artistsSection.classList.remove('hidden');
                } else {
                    artistsSection.classList.add('hidden');

                    artistFields.innerHTML = `
                        <div class="flex items-center space-x-4">
                            <input type="text" name="artists[]" placeholder="Enter artist name"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <button type="button"
                                class="add-artist inline-flex items-center rounded-md bg-green-500 px-3 py-1.5 text-white hover:bg-green-600">
                                +
                            </button>
                        </div>
                    `;
                }
            });
    
            // Add new artist field dynamically
            artistFields.addEventListener('click', (e) => {
                if (e.target && e.target.classList.contains('add-artist')) {
                    const artistField = document.createElement('div');
                    artistField.className = 'flex items-center space-x-4';
                    artistField.innerHTML = `
                        <input type="text" name="artists[]" placeholder="Artist Name"
                            class="w-full rounded border px-3 py-2">
                        <button type="button"
                            class="remove-artist inline-flex items-center rounded-md bg-red-500 px-3 py-1.5 text-white hover:bg-red-600">
                            -
                        </button>
                    `;
                    artistFields.appendChild(artistField);
                }
            });
    
            // Remove artist field
            artistFields.addEventListener('click', (e) => {
                if (e.target && e.target.classList.contains('remove-artist')) {
                    e.target.parentElement.remove();
                }
            });
        });


        document.addEventListener('DOMContentLoaded', () => {
            const updateButtons = document.querySelectorAll('.update-event-button');
            updateButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
            const eventCard = e.target.closest('.group');
            const updateForm = eventCard.querySelector('.event-update-form');
            updateForm.classList.toggle('hidden');
        });
    });
});

function closeUpdateForm() {
  const form = document.querySelector('.event-update-form');
  form.classList.add('hidden');
}

                                
document.querySelector('input[name="ticketPrice"]').addEventListener('input', function (e) {
    if (e.target.value < 1) {
        e.target.value = 1; 
     }
});


    </script>

    
</body>
