<div x-data="{
	editModalActive: false,
	task: {
		name: '',
		description: '',
		id: 0,
		type: '',
	},

	editTask(task) {
		this.task = task ?? this.resetTask;
		this.editModalActive = task != null;
		if(task) {
			$wire.newType = task.type;
			$wire.newDescription = task.description;
			$wire.newName = task.name;
		}
	},
	get resetTask() {
		return {
			name: '',
			description: '',
			id: 0,
			type: '',
		}
	},
}">
	<table class="border-spacing-3 border-separate w-full table-fixed">
		<tr>
			<th class="p-1 text-start w-[20%]">Titel</th>
			<th class="p-1 text-center w-1/12">Prioritet</th>
			<th class="p-1 text-start">Beskrivelse</th>
			<th class="p-1 text-end w-[200px]">Handling</th>
		</tr>

		<tbody>
			@php /** @var App\Models\Task $task */ @endphp
			@foreach ($tasks as $task)
				<tr>
					<td class="line-clamp-1">{{ $task->name }}</td>
					<td
						class="text-center rounded-lg"
						style="background-color: {{ $task->type()->color() }}"
					>
						{{ $task->type() }}
					</td>
					<td class="line-clamp-1">
						{{ $task->description }}
					</td>
					<td class="text-end">
						<button wire:click="delete({{ $task->id }})">Slet</button>
						<button x-on:click="editTask(@js($task))">Rediger</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<form
		x-show="editModalActive"

		class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 p-4 shadow-xl flex flex-col border rounded-xl"
		wire:submit="update(task.id)"
	>
		<h1 class="font-bold">Rediger form</h1>
		<span>Bestem det nye navn, beskrivelse og prioritet!</span>

		<label for="title" class="text-sm mt-1">Titel</label>
		<input
			:value="editModalActive && task.name"
			name="title"
			id="title"
			class="border rounded-md p-1"
			wire:model="newName"
		/>
		<span>@error('newName') {{ $message }} @enderror</span>

		<label for="type" class="text-sm mt-1">Prioritet</label>
		<select
			x-model="task.type"
			name="type"
			id="type"
			class="border rounded-md p-1"
			wire:model="newType"
		>
			@php /** @var App\Enums\TaskPriority $type */ @endphp
			@foreach ($types as $type)
				<option value="{{$type}}" x-bind:selected="task.type == '{{ $type->name }}'.toLowerCase()">{{$type}}</option>
			@endforeach
		</select>

		<label for="description" class="text-sm mt-1">Beskrivelse</label>
		<textarea
			:value="task && task.description"
			name="description"
			rows="4"
			id="description"
			class="border rounded-md p-1"
			wire:model="newDescription"
		></textarea>
		<span>@error('newDescription') {{ $message }} @enderror</span>

		<div class="inline-flex justify-between">
			<button
				class="bg-gray-700 w-fit px-4 py-2 text-white rounded-lg mt-4"
				x-on:click="editTask(null);"
				type="reset"
			>
				Annullèr
			</button>

			<button
				class="bg-blue-600 w-fit px-4 py-2 text-white rounded-lg mt-4"
				type="submit"
			>
				Opdater
			</button>
		</div>

	</form>
</div>