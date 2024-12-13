<table class="border-spacing-3 border-separate">
	<tr>
		<th class="p-1 text-start">Titel</th>
		<th class="p-1 text-center">Prioritet</th>
		<th class="p-1 text-start">Beskrivelse</th>
	</tr>

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
		</tr>
	@endforeach
</table>
