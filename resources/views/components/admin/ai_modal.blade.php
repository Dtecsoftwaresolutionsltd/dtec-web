@props([
    'id' => 'aiGenerateModal',
    'action' => url('admin/openai/ask'),
    'target' => 'description', // textarea ID to fill on success
    'title' => __('Ask with AI'),
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close ai-promt-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="{{ $id }}-form" action="{{ $action }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="{{ $id }}-prompt"
                            class="crancy__item-label">{{ __('Write your prompt here') }}</label>
                        <input type="text" class="crancy__item-input" id="{{ $id }}-prompt" name="prompt"
                            placeholder="{{ __('e.g. Write a short product description for a leather wallet') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="{{ $id }}-answer" class="crancy__item-label">{{ __('Output') }}</label>
                        <textarea class="crancy__item-input crancy__item-textarea" id="{{ $id }}-answer" rows="8"
                            placeholder="{{ __('Generated output will appear here...') }}"></textarea>
                    </div>
                </form>
                <div class="small text-muted" id="{{ $id }}-status"></div>
            </div>
            <div class="modal-footer">
                <div class="container-fluid">
                    <div class="row g-2 justify-content-end">
                        <div class="col-auto">
                            <button type="button" class="crancy-btn delete_danger_btn"
                                id="{{ $id }}-clear">{{ __('Clear Prompt') }}</button>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="crancy-btn"
                                id="{{ $id }}-copy">{{ __('Copy Output') }}</button>
                        </div>

                        <div class="col-auto">
                            <button type="button" class="bg-primary crancy-btn"
                                id="{{ $id }}-generate">{{ __('Generate Output') }}</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function($) {
        $(function() {
            var $form = $("#{{ $id }}-form");
            var $status = $("#{{ $id }}-status");
            var $generate = $("#{{ $id }}-generate");
            var $copy = $("#{{ $id }}-copy");
            var $clear = $("#{{ $id }}-clear");
            var $close = $("#{{ $id }}-close");
            var $prompt = $("#{{ $id }}-prompt");
            var $answer = $("#{{ $id }}-answer");
            var targetId = @json($target);

            if ($form.length === 0) return;

            function setStatus(msg, isError) {
                $status.text(msg || '').removeClass('text-danger text-muted').addClass(isError ?
                    'text-danger' : 'text-muted');
            }

            function insertIntoTarget(text) {
                var $target = $("#" + targetId);
                if ($target.length) {
                    $target.val(text || '').trigger('input');
                }
            }

            $generate.on('click', function() {
                setStatus("{{ __('Generating output...') }}", false);
                $generate.prop('disabled', true);
                $copy.prop('disabled', true);
                $clear.prop('disabled', true);

                var formData = new FormData($form[0]);
                var csrf = $form.find('input[name="_token"]').val();

                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': csrf
                    }
                }).done(function(result) {
                    if (!result || result.ok !== true) {
                        var msg = (result && result.message) ? result.message :
                            'Request failed';
                        setStatus(msg, true);
                        return;
                    }
                    var answer = result.answer || '';
                    $answer.prop('readonly', false).val(answer).prop('readonly', true);
                    insertIntoTarget(answer);
                    setStatus("{{ __('Output generated') }}", false);
                }).fail(function(xhr) {
                    var msg = 'Failed';
                    try {
                        var r = xhr.responseJSON;
                        if (r && r.message) msg = r.message;
                    } catch (e) {}
                    setStatus(msg, true);
                }).always(function() {
                    $generate.prop('disabled', false);
                    $copy.prop('disabled', false);
                    $clear.prop('disabled', false);
                });
            });

            $copy.on('click', function() {
                $answer.prop('readonly', false).select();
                try {
                    document.execCommand('copy');
                    setStatus("{{ __('Output copied') }}", false);
                } catch (e) {
                    setStatus("{{ __('Copy failed') }}", true);
                }
                $answer.prop('readonly', true);
            });

            function clearAll() {
                $prompt.val('');
                $answer.prop('readonly', false).val('').prop('readonly', true);
                insertIntoTarget('');
                setStatus('', false);
            }

            $clear.on('click', clearAll);
            $close.on('click', clearAll);
        });
    })(jQuery);
</script>
