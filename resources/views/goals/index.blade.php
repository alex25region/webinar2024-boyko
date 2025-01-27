<div class="card p-2">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="m-0">{{__('Спиcок целей')}}&nbsp;&nbsp;<a href="{{ route('goals.create', $project) }}" class="btn btn-round btn-secondary shadow">Добавить цель</a></h2>

        </div>
    </div>

    <div class="card-body">
        <div class="col-12">
            <table class="table table-hover table-sm table-striped table-bordered text-center shadow-sm">
                <thead>
                <tr>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Наименование') }}</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Срок в месяцах') }}</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Дата добавления') }}</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Действия') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($project->goals as $goal)
                    <tr>
                        <td>{{ $goal->name }}</td>
                        <td>{{ $goal->term_in_months }}</td>
                        <td>{{ $goal->created_at->format('d.m.Y') }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('goals.show', [$project, $goal]) }}"
                               class="btn btn-success btn-sm me-2 shadow fw-normal py-1 px-2">
                                {{__('Подробнее')}}
                            </a>
                            <a href="{{ route('goals.edit', [$project, $goal]) }}"
                               class="btn btn-secondary btn-sm me-2 shadow fw-normal py-1 px-2">
                                {{__('Редактировать')}}
                            </a>
                            <a href="#" class="btn btn-danger btn-sm me-2 shadow fw-normal py-1 px-2"
                               onclick="event.preventDefault();
                                        // TODO перевод фразы
                                       if(confirm('Вы действительно хотите удалить цель?')) {document.getElementById('goal-delete-{{ $goal->id }}').submit();}
                                       ">
                                {{__('Удалить')}}
                            </a>
                            <form action="{{ route('goals.destroy', [$project, $goal]) }}" method="POST" id="goal-delete-{{ $goal->id }}">
                                @csrf @method('delete')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">{{ __('Записей не найдено')  }}</td>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
